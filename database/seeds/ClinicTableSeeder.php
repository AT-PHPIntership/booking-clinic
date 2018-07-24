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
        factory(App\Clinic::class, 10)->create();
    }
}
