<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User;
use App\Models\ProjectOwner;
use Faker\Generator as Faker;

$factory->define(ProjectOwner::class, function (Faker $faker) {
    return [
        'id' => factory(User::class)->create()->id,
        'nik' => $faker->randomDigit(16),
        'about' => $faker->realText(),
        'company' => $faker->company,
    ];
});
