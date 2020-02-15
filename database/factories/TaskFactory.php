<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\TaskStatus;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name'          => $faker->sentence(3),
        'description'   => $faker->sentence,
        'status_id'     => TaskStatus::inRandomOrder()->first(),
    ];
});
