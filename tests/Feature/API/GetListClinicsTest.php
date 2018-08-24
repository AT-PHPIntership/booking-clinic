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

    /**
     * Init sample records of clinics for testing
     *
     * @return void
     */
    private function initDataSample()
    {
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
     * Return structure of json empty data.
     *
     * @return array
     */
    public function json_structure_list_clinics_empty()
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
                'data' => []
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
        $this->initDataSample();
        $response = $this->json('GET', '/api/clinics');
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinics());
        $data = json_decode($response->getContent())->result->data;
        foreach ($data as $clinic) {
            $arrayCompare = [
                'id' => $clinic->id,
                'name' => $clinic->name,
                'email' => $clinic->email,
                'phone' => $clinic->phone,
                'address' => $clinic->address,
                'description' => $clinic->description,
                'lat' => $clinic->lat,
                'lng' => $clinic->lng,
            ];
            $this->assertDatabaseHas('clinics', $arrayCompare);
        }
    }

    /**
     * Test it can get list clinic with filter.
     *
     * @return void
     */
    public function test_it_can_get_list_clinics_with_filter()
    {
        $this->initDataSample();
        $dataTest = [
            'page' => 2,
            'sortBy' => 'name'
        ];
        $clinics = \App\Clinic::with('images', 'clinicType:id,name')->orderBy('name', 'ASC')
            ->skip(self::NUMBER_CLINIC_PERPAGE * ($dataTest['page'] - 1))
            ->take(self::NUMBER_CLINIC_PERPAGE)
            ->get();
        $response = $this->json('GET', '/api/clinics?page=' . $dataTest['page'] . '&sort_by=' . $dataTest['sortBy']);
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinics());
        $data = json_decode($response->getContent())->result->data;
        foreach ($data as $key => $clinicJson) {
            $arrayCompareJson = [
                'id' => $clinicJson->id,
                'name' => $clinicJson->name,
                'email' => $clinicJson->email,
                'phone' => $clinicJson->phone,
                'address' => $clinicJson->address,
                'description' => $clinicJson->description,
                'lat' => $clinicJson->lat,
                'lng' => $clinicJson->lng,
                'path' => $clinicJson->images[0]->path,
                'clinic_type' => [
                    'id' => $clinicJson->clinic_type->id,
                    'name' => $clinicJson->clinic_type->name
                ]
            ];

            $clinicDB = $clinics[$key];
            $arrayCompareDB = [
                'id' => $clinicDB->id,
                'name' => $clinicDB->name,
                'email' => $clinicDB->email,
                'phone' => $clinicDB->phone,
                'address' => $clinicDB->address,
                'description' => $clinicDB->description,
                'lat' => $clinicDB->lat,
                'lng' => $clinicDB->lng,
                'path' => $clinicDB->images[0]->path,
                'clinic_type' => [
                    'id' => $clinicDB->clinicType->id,
                    'name' => $clinicDB->clinicType->name
                ]
            ];
            $this->assertEquals($arrayCompareJson, $arrayCompareDB);
        }
    }

    /**
     * Test paginate
     *
     * @return void
     */
    public function testJsonPaginate()
    {
        $this->initDataSample();
        $dataTest = [
            'perpage' => 5,
            'page' => 2
        ];
        $response = $this->json('GET', '/api/clinics?perpage=' . $dataTest['perpage'] . '&page=' . $dataTest['page']);
        $paginator = json_decode($response->getContent())->result->paginator;
        $this->assertEquals($paginator->per_page, $dataTest['perpage']);
        $this->assertEquals($paginator->current_page, $dataTest['page']);
    }

    /**
     * Test it can not show list clinic with empty data.
     *
     * @return void
     */
    public function test_it_can_not_show_with_empty_data()
    {
        $response = $this->json('GET', '/api/clinics');
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structure_list_clinics_empty());
    }
}
