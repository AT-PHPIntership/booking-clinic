<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'clinic_id' => App\Clinic::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
        'book_time' => $faker->dateTimeBetween($startDate = '+0 days', $endDate = '+1 months'),
        'status' => $faker->numberBetween($min = 0, $max = 3)
    ];
});
