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
        $string = file_get_contents(__DIR__.'/seed.json');
        $json = json_decode($string, true);

        foreach ($json as $data) {
            //create clinic
            $clinic = factory(App\Clinic::class)->create([
                'name' => $data['name'],
                'address' => $data['address'],
                'lat' => $data['lat'],
                'lng' => $data['lng'],
                'slug' => str_slug($data['name']),
                'clinic_type_id' => $data['clinic_type_id']
            ]);
            $clinic->images()->saveMany(factory(App\ClinicImage::class, 3)->make());
            $clinic->appointments()->saveMany(factory(App\Appointment::class, 20)->make(['clinic_id' => $clinic->id]));
            //create admin for manage clinic
            factory(App\Admin::class)->create([
                'name' => 'admin ' . $clinic->id,
                'email' => $clinic->email,
                'role' => App\Admin::CLINIC_ADMIN,
                'clinic_id' => $clinic->id
            ]);
        }

        App\Appointment::status(App\Appointment::STATUS_COMPLETED)
            ->each(function ($appointment) {
                $exam = factory(App\Examination::class)->make(['appointment_id' => $appointment->id]);
                $appointment->examination()->save($exam);
            });
    }
}
