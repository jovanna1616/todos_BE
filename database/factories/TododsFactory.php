<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
	$priority = [
		"Top priority",
		"Priority level 2",
		"Priority level 3",
		"Priority level 4",
		"Priority level 5"
	];

    return [
        'title' => $faker->text($maxNbChars = 50),
        'completed' => $faker->boolean($chanceOfGettingTrue = 50),
        'priority' => $priority[rand(0, count($priority) - 1)]
    ];
});
