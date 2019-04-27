<?php

namespace Tests\Unit\ModelRelation;

use Tests\TestCase;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test student belongs to user.
     *
     * @return void
     */
    public function testBelongsToUser()
    {
        $student = factory(Student::class)->create();
        $this->assertInstanceOf(User::class, $student->user);
    }
}
