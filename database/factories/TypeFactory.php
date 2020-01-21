<?php

use Faker\Generator as Faker;

/** @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(\App\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'consumer_number' => $faker->numberBetween(-2147483648, 2147483647),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->numberBetween(0, 4294967295),
    ];
});
