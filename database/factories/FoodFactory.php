<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\Modules\Food\Entities\Food::class, function (Faker $faker) {

    $categories = \Illuminate\Support\Facades\DB::table('categories')->pluck('id');

    return [
        'title' => $faker->text(5),
        'description' => $faker->text(40),
        'image' => $faker->imageUrl(),
        'category_id' => $faker->randomElement($categories),
        'buffer' => $faker->numberBetween(0,100),
        'prepare_minutes' => $faker->numberBetween(20,100)
    ];
});
