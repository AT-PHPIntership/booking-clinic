<?php

use Illuminate\Database\Seeder;

class ClinicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Clinic::class, 20)->create()->each(function ($u) {
            $u->images()->saveMany(factory(App\ClinicImage::class, 3)->make());
        });
    }
}
