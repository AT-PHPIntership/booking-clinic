<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
        'clinic_id' => function() {
            return factory(App\Clinic::class)->create()->id;
        },
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'book_time' => $faker->dateTimeBetween($startDate = '+0 days', $endDate = '+1 months'),
        'status' => $faker->numberBetween($min = 0, $max = 3)
    ];
});
