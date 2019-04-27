<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\User;
use App\Models\Project;
use App\Models\Discussion;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {
    return [
        'project_id' => factory(Project::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
        'message' => $faker->realText(100),
    ];
});
