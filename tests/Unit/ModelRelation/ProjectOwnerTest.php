<?php

namespace Tests\Unit\ModelRelation;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectOwner;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectOwnerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test project owner belongs to user.
     *
     * @return void
     */
    public function testBelongsToUser()
    {
        $owner = factory(ProjectOwner::class)->create();
        $this->assertInstanceOf(User::class, $owner->user);
    }

    /**
     * Test ProjectOwner has many projects.
     *
     * @return void
     */
    public function testHasManyProjects()
    {
        $owner = factory(ProjectOwner::class)->create();
        // add published projects
        $owner->projects()->saveMany(
            factory(Project::class, 10)->make()
        );
        $this->assertCount(10, $owner->projects);

        // Delete project
        $owner->projects->first()->delete();
        $owner->refresh();
        $this->assertCount(1, $owner->deletedProjects);
        $this->assertCount(9, $owner->projects);

        // Add draft projects
        $owner->projects()->saveMany(
            factory(Project::class, 5)->state('draft')->make()
        );
        $owner->refresh();
        $this->assertCount(1, $owner->deletedProjects);
        $this->assertCount(14, $owner->projects);
        $this->assertCount(9, $owner->publishedProjects);
        $this->assertCount(5, $owner->draftedProjects);
    }
}
