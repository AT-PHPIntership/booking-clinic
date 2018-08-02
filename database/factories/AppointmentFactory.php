<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'description' => $faker->text,
<<<<<<< HEAD
        'clinic_id' => function() {
            return factory(App\Clinic::class)->create()->id;
        },
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'book_time' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 months'),
=======
        // 'clinic_id' => function() {
        //     return factory(App\Clinic::class)->create()->id;
        // },
        // 'user_id' => function() {
        //     return factory(App\User::class)->create()->id;
        // },
        'clinic_id' => App\Clinic::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
        'book_time' => $faker->dateTimeBetween($startDate = '+0 days', $endDate = '+1 months'),
>>>>>>> add test route js and fix factory
        'status' => $faker->numberBetween($min = 0, $max = 3)
    ];
});
