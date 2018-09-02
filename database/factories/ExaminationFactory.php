<?php

use Faker\Generator as Faker;

$factory->define(App\Examination::class, function (Faker $faker) {
    return [
        'diagnostic' => $faker->sentence,
        'result' => $faker->text,
        'description' => $faker->text,
        'appointment_id' => function() {
            return factory(App\Appointment::class)->create()->id;
        }
    ];
});
