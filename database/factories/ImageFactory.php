<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'path' => '/images/clinic-' . $faker->numberBetween($min = 1, $max = 5) . '.png'
    ];
});
