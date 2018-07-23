<?php

use Illuminate\Database\Seeder;

class ClinicTypesTableSeeder extends Seeder
{
    private $types = [
        'Đa khoa',
        'Ngoại khoa',
        'Nội khoa',
        'Răng hàm mặt',
        'Tai mũi họng',
        'Sản nhi',
        'Phục hồi chức năng'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            DB::table('clinic_types')->insert([
                'name' => $type,
                'created_at' => now()
            ]);
        }
    }
}
