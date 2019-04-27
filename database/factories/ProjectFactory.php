<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Carbon\Carbon;
use App\Models\Project;
use App\Models\ProjectOwner;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_owner_id' => factory(ProjectOwner::class)->create()->id,
        'title' => $faker->realText(10),
        'description' => $faker->realText(200),
        'duration_start' => $start = $faker->dateTimeThisMonth(),
        'duration_end' => Carbon::parse($start)->addDays(rand(7, 100)),
        'is_published' => true,
    ];
});

$factory->state(Project::class, 'draft', function (Faker $faker) {
    return [
        'is_published' => false,
    ];
});
