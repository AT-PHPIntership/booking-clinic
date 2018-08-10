<?php

use Illuminate\Database\Seeder;
use App\Appointment;
use App\Admin;

class ExaminationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinic = factory(App\Clinic::class)->create([
            'email' => 'clinic@gmail.com'
        ]);
        factory(Admin::class)->create([
            'email' => $clinic->email,
            'name' => $clinic->name,
            'role' => Admin::CLINIC_ADMIN,
            'clinic_id' => $clinic->id
        ]);
        factory(Appointment::class, 10)->create([
            'clinic_id' => $clinic->id,
            'status' => Appointment::STATUS_COMPLETED
        ])->each(function ($appointment) {
            $exam = factory(App\Examination::class)->make(['appointment_id' => $appointment->id]);
            $appointment->examination()->save($exam);
        });
    }
}
