<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\Modules\Category\Entities\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
    ];
});
