<?php

use Faker\Generator as Faker;

$factory->define(App\Clinic::class, function (Faker $faker) {
    $name = $faker->name;
    $slug = str_slug($name);
    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'phone' => preg_replace('/[^0-9.]+/', '', \Faker\Factory::create('vi_VN')->phoneNumber),
        'address' => preg_replace('~[\r\n]+~', '', $faker->address),
        'description' => $faker->text,
        'lat' => $faker->latitude($min = -90, $max = 90),
        'lng' => $faker->longitude($min = -180, $max = 180),
        'clinic_type_id' => factory(App\ClinicType::class)->create()->id,
        'slug' => $slug,
    ];
});
