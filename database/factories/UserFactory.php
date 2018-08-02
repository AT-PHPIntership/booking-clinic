<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->boolean(),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->tollFreePhoneNumber(),
        'address' => preg_replace('~[\r\n]+~', '', $faker->address),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
