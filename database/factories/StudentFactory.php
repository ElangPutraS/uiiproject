<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Student;
use App\Models\User;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'id' => factory(User::class)->create()->id,
        'nim' => $faker->randomDigit(8),
        'about' => $faker->realText()
    ];
});
