<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

class UserLoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * set up function
     */
    public function setUp() {
        parent::setUp();
        factory(\App\User::class)->create([
            'name' => 'quan',
            'email' => 'hongquan@gmail.com',
            'password' => Hash::make('secret')
        ]);
    }

    /**
     *  function json struc user login success
     *
     * @return array
     */
    public function json_structe_user_login_success() {
        return [
            'result' => [
                'access_token',
                'token_type',
                'expires_at'
            ],
            'code'
        ];
    }

    /**
     *  function json struc user login error
     *
     * @return array
     */
    public function json_structe_user_login_error() {
        return [
            'message',
            'errors' => [
                'email'
            ],
            'code',
            'request' => [
                'email',
                'password',
                'remember_me'
            ]
        ];
    }

    /**
     *  function json struc user login fail
     *
     * @return array
     */
    public function json_structe_user_login_fail() {
        return [
            'error',
            'code',
        ];
    }

    /**
     * Test user login success.
     *
     * @return void
     */
    public function test_user_login_success()
    {
        $body = [
            'email' => 'hongquan@gmail.com',
            'password' => 'secret',
            'remember_me' => 1
        ];
        $response = $this->json('POST', '/api/login', $body);
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structe_user_login_success());
    }

    /**
     * Test user login fail.
     *
     * @return void
     */
    public function test_user_login_fail()
    {
        $body = [
            'email' => 'hongquan@gmail.com',
            'password' => 'secrettt',
            'remember_me' => 1
        ];
        $response = $this->json('POST', '/api/login', $body);
        $response->assertStatus(401)
            ->assertJsonFragment([
                'error' =>  'Email or password is incorrect'
            ])
            ->assertJsonStructure($this->json_structe_user_login_fail());
    }

     /**
     * list test case validate input user login
     * @param
     * @return array
     */
    public function list_test_case_validate_input_user_login() {
        return [
            [
                [
                    "email" => "",
                    "password" => "",
                    "remember_me" => 1
                ],
                [
                    "email",
                    "password"
                ]
            ],
            [
                [
                    "email" => "hongquan@gmailcom",
                    "password" => "secret",
                    "remember_me" => 1
                ],
                [
                    "email",
                ]
            ]
        ];
    }

    /**
     * @param string body
     * @param string field
     * @dataProvider list_test_case_validate_input_user_login
     */
    public function test_user_login_error($body, $field)
    {
        $response = $this->json('POST', '/api/login', $body);
        $response->assertStatus(422)
            ->assertJsonValidationErrors($field)
            ->assertJsonStructure($this->json_structe_user_login_error());
    }
}
