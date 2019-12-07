<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Requests;
use Faker\Generator as Faker;

$factory->define(Requests::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'discription' => $faker->word,
        'day' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
