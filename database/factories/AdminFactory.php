<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin'),
        'role' => App\Admin::SUPER_ADMIN,
    ];
});
