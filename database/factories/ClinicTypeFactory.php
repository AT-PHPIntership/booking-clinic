<?php

use Faker\Generator as Faker;

$factory->define(App\ClinicType::class, function (Faker $faker) {
    return [
        'name' => $faker->word()
    ];
});
