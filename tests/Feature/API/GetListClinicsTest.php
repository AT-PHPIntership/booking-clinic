<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GetListClinicsTest extends TestCase
{
    use DatabaseMigrations;

    private const NUMBER_CLINIC_CREATE = 20;
    private const NUMBER_IMAGE_PER_CLINIC = 3;
    private const NUMBER_CLINIC_PERPAGE = 15;

    public function setUp()
    {
        parent::setUp();
        factory(\App\Clinic::class, self::NUMBER_CLINIC_CREATE)->create()->each(function ($u) {
            $u->images()->saveMany(factory(\App\ClinicImage::class, self::NUMBER_IMAGE_PER_CLINIC)->make());
        });
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function json_structure_list_clinics()
    {
        return [
            'result' => [
                'paginator' => [
                    'current_page',
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total'
                ],
                'data' => [
                    [
                        'id',
                        'name',
                        'email',
                        'phone',
                        'address',
                        'description',
                        'lat',
                        'lng',
                        'slug',
                        'clinic_type_id',
                        'deleted_at',
                        'created_at',
                        'updated_at',
                        'images' => [
                            [
                                'id',
                                'path',
                                'clinic_id',
                                'created_at',
                                'updated_at'
                            ]
                        ],
                        'clinic_type' => [
                            'id',
                            'name'
                        ]
                    ]
                ]
            ],
            'code'
        ];
    }

    /**
     * Test it can get list clinic.
     *
     * @return void
     */
    public function test_it_can_get_list_clinics()
    {
        $clinic = \App\Clinic::with('images', 'clinicType:id,name')->find(1);
        $this->json('GET', '/api/clinics')
            ->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinics())
            ->assertJsonFragment([
                'id' => $clinic->id,
                'name' => $clinic->name,
                'email' => $clinic->email,
                'phone' => $clinic->phone,
                'address' => $clinic->address,
                'description' => $clinic->description,
                'lat' => $clinic->lat,
                'lng' => $clinic->lng,
                'path' => $clinic->images[0]->path,
                'clinic_type' => [
                    'id' => $clinic->clinicType->id,
                    'name' => $clinic->clinicType->name
                ]
            ]);
    }

    /**
     * Test it can get list clinic with filter.
     *
     * @return void
     */
    public function test_it_can_get_list_clinics_with_filter()
    {
        $clinic = \App\Clinic::with('images', 'clinicType:id,name')->orderBy('name', 'ASC')->skip(self::NUMBER_CLINIC_PERPAGE)->take(1)->first();
        $this->json('GET', '/api/clinics?page=2&sort_by=name')
            ->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinics())
            ->assertJsonFragment([
                'id' => $clinic->id,
                'name' => $clinic->name,
                'email' => $clinic->email,
                'phone' => $clinic->phone,
                'address' => $clinic->address,
                'description' => $clinic->description,
                'lat' => $clinic->lat,
                'lng' => $clinic->lng,
                'path' => $clinic->images[0]->path,
                'clinic_type' => [
                    'id' => $clinic->clinicType->id,
                    'name' => $clinic->clinicType->name
                ]
            ]);
    }
}
