<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClinicTypeTest extends TestCase
{
    use DatabaseMigrations;

    private const NUMBER_CLINIC_TYPE_CREATE = 5;

    public function setUp()
    {
        parent::setUp();
        factory(\App\ClinicType::class, self::NUMBER_CLINIC_TYPE_CREATE)->create();
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function json_structure_list_clinic_types()
    {
        return [
            'result' => [
                [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ]
            ],
            'code'
        ];
    }

    /**
     * Return structure of json.
     *
     * @return void
     */
    public function test_it_can_get_list_clinic_types()
    {
        $clinicType = \App\ClinicType::all()->random()->first();
        $this->json('GET', '/api/clinic-types')
            ->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinic_types())
            ->assertJsonCount(self::NUMBER_CLINIC_TYPE_CREATE, $key = 'result')
            ->assertJson([
                'result' => [
                    [
                        'id' => $clinicType->id,
                        'name' => $clinicType->name,
                        'created_at' => $clinicType->created_at,
                        'updated_at' => $clinicType->updated_at,
                    ]
                ]]);
    }
}
