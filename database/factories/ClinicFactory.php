<?php

use Faker\Generator as Faker;

$factory->define(App\Clinic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'address' => $faker->address,
        'description' => $faker->text,
        'lat' => $faker->latitude($min = -90, $max = 90),
        'lng' => $faker->longitude($min = -180, $max = 180),
        'clinic_type_id' => App\ClinicType::pluck('id')->random()
    ];
});
