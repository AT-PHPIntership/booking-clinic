<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;

class UserUpdateProfileTest extends TestCase
{
    protected $user;

    /**
     *  set up function
     */
    public function setUp() {
        parent::setUp();
        Passport::actingAs(factory(\App\User::class)->create([
            'name' => 'userName',
            'gender' => '0',
            'phone' => '0968457018',
            'address' => 'Viet Nam',
            'dob' => '1995-03-22',
            'email' => 'quan@gmail.com',
            'password' => Hash::make('secret')
        ]));
    }

    /**
     * json struc user update profile success
     * @return array
     */
    public function json_structure_user_update_profile_success() {
        return [
            'result' => [
                'id',
                'name',
                'email',
                'gender',
                'dob',
                'phone',
                'address',
                'created_at',
                'updated_at'
            ],
            'code'
        ];
    }

    /**
     * json struc user update profile error
     * @return array
     */
    public function json_structure_user_update_profile_error() {
        return [
            'message',
            'errors',
            'code',
            'request'
        ];
    }

    /**
     * Test user update profile success.
     *
     * @return void
     */
    public function test_user_update_profile_success()
    {
        $body = [
            "name" => "Top",
            "gender" => 1,
            "dob" => "1995-02-22",
            'phone' => '0123456781',
            'address' => 'Da Nang',
        ];
        $response = $this->json('PUT', '/api/profile', $body);
        $response->assertStatus(200)
            ->assertJsonFragment($body)
            ->assertJsonStructure($this->json_structure_user_update_profile_success());
        $this->assertDatabaseHas('users', $body);
    }

    /**
     * list test case validate input update user profile
     * @param
     * @return array
     */
    public function list_test_case_validate_input_user_update_profile()
    {
        return [
            [
                [
                    "gender" => "3",
                    "dob" => "1995-03-222"
                ],
                [
                    "gender" =>  [
                        "The gender field must be true or false.",
                    ],
                    "dob" => [
                        "The dob does not match the format Y-m-d."
                    ],
                ]
            ],
            [
                [
                    "name" => "",
                    "phone" => "01234"
                ],
                [
                    "name" => [
                        "The name field is required."
                    ],
                    "phone" => [
                        "The phone must be between 8 and 12 digits."
                    ]
                ]
            ],

        ];
    }

    /**
     * @param string body
     * @param string message
     * @dataProvider list_test_case_validate_input_user_update_profile
     */
    public function test_user_update_profile_error($body, $message)
    {
        $response = $this->json('PUT', '/api/profile', $body);
        $response->assertStatus(422)
            ->assertJsonFragment($message)
            ->assertJsonStructure($this->json_structure_user_update_profile_error());
    }
}
