<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 50),
        'completed' => $faker->boolean($chanceOfGettingTrue = 50),
        'priority' => rand(1,5)
    ];
});
