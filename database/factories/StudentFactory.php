<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User;
use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'id' => factory(User::class)->create()->id,
        'nim' => $faker->randomDigit(8),
        'about' => $faker->realText(),
    ];
});
