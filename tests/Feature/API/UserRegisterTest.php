<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRegisterTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
    }
    public function json_structure_user_register_success() {
        return [
            'result',
            'code'
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_register_success()
    {
        $body = [
            "name" => "hongquan1234",
            "email" => "hongquan1234@gmail.com",
            "password" => "secret",
            "password_confirmation" => "secret"

        ];
        try {
        $response = $this->json('POST', 'api/register', $body, ['Accept' => 'application/json']);
        } catch (\Exception $e) {
            dd($e);
        }
        // dd($response);
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structure_user_register_success());
    }
}
