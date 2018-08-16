<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

class UserRegisterTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        factory(\App\User::class)->create([
            'name' => 'userName',
            'email' => 'quan@gmail.com',
            'password' => Hash::make('secret')
        ]);
    }
    public function json_structure_user_register_success() {
        return [
            'result',
            'code'
        ];
    }
    public function json_structure_user_register_fail() {
        return [
            'message',
            'errors',
            'code',
            'request'
        ];
    }

    /**
     * Test user register success.
     *
     * @return void
     */
    public function test_user_register_success()
    {
        $body = [
            "name" => "hongquan1234",
            "email" => "hongquan1234@gmail.com",
            "gender" => 0,
            "dob" => "1995-02-22",
            'phone' => '0123456789',
            'address' => 'DA Nang',
            "password" => "secret",
            "password_confirmation" => "secret"

        ];
        $response = $this->json('POST', '/api/register', $body);
        $response->assertStatus(201)
            ->assertJsonStructure($this->json_structure_user_register_success());
        $this->assertDatabaseHas('users', [
            "email" => "hongquan1234@gmail.com"
        ]);
    }

     /**
     * list test case validate input user register
     * @param
     * @return array
     */
    public function list_test_case_validate_input_user_register()
    {
        return [
            [
                [
                    "name" => "",
                    "email" => "",
                    "password" => "secret",
                    "password_confirmation" => "secret"
                ],
                [
                    "name",
                    "email"
                ]
            ],
            [
                [
                    "name" => "userName",
                    "email" => "quan@gmail.com",
                    "password" => "secret",
                    "password_confirmation" => "secrettt"
                ],
                [
                    "email",
                    "password"
                ]
            ],

        ];
    }

    /**
     * @param string body
     * @param string field
     * @dataProvider list_test_case_validate_input_user_register
     */
    public function test_user_register_fail($body, $field)
    {
        $response = $this->json('POST', '/api/register', $body);
        $response->assertStatus(422)
            ->assertJsonValidationErrors($field)
            ->assertJsonStructure($this->json_structure_user_register_fail());
    }
}
