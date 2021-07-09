<?php

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'admin_id' => rand(1, 5),
        'name' => $faker->name(),
        'description' => $faker->sentence(5, true),
    ];
});
