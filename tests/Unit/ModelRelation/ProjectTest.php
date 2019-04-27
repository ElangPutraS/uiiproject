<?php

namespace Tests\Unit\ModelRelation;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Student;
use App\Models\Discussion;
use App\Enums\StatusOfferal;
use App\Models\ProjectOwner;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test project belongs to project owner.
     *
     * @return void
     */
    public function testBelongsToProjectOwner()
    {
        $project = factory(Project::class)->create();
        $this->assertInstanceOf(ProjectOwner::class, $project->owner);
    }

    /**
     * Test project has many tags.
     *
     * @return void
     */
    public function testHasManyTags()
    {
        $project = factory(Project::class)->create();
        $project->tags()->saveMany(
            factory(Tag::class, 5)->make()
        );

        $this->assertCount(5, $project->tags);
    }

    /**
     * Test project has many bidders.
     *
     * @return void
     */
    public function testHasManyBidders()
    {
        $project = factory(Project::class)->create();
        $users   = factory(Student::class, 5)->create();

        foreach ($users as $user) {
            $user->offerals()->attach($project->id);
        }

        $this->assertCount(5, $project->bidders);
    }

    /**
     * Test project has many Students.
     *
     * @return void
     */
    public function testHasManyStudents()
    {
        $project = factory(Project::class)->create();
        $students   = factory(Student::class, 5)->create();
        $student    = $students->first();

        foreach ($students as $student) {
            $student->offerals()->attach($project->id);
        }

        $project->bidders()
            ->updateExistingPivot($student->id, ['status' => StatusOfferal::ACCEPT]);
        $this->assertCount(1, $project->students);
    }

    /**
     * Test project has many Comments.
     *
     * @return void
     */
    public function testHasManyComments()
    {
        $project = factory(Project::class)->create();
        factory(Comment::class, 20)->create([
            'project_id' => $project->id
        ]);

        $this->assertCount(20, $project->comments);
    }

    /**
     * Test project has many Comments.
     *
     * @return void
     */
    public function testHasManyDiscussions()
    {
        $project = factory(Project::class)->create();
        factory(Discussion::class
        , 20)->create([
            'project_id' => $project->id
        ]);

        $this->assertCount(20, $project->discussions);
    }
}
