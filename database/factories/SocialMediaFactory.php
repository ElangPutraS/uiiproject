<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\SocialMedia;
use Faker\Generator as Faker;

$factory->define(SocialMedia::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName
    ];
});
