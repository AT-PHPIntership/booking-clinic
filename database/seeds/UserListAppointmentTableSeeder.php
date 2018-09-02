<?php

use Illuminate\Database\Seeder;

class UserListAppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::first()->appointments()
            ->saveMany(factory(\App\Appointment::class, 20)->make());
        App\Appointment::status(App\Appointment::STATUS_COMPLETED)
            ->each(function($appointment) {
                $exam = factory(\App\Examination::class)->make(['appointment_id' =>$appointment->id]);
                $appointment->examination()->save($exam);
            });
    }
}
