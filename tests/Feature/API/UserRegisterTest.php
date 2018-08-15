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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function json_structure_user_register()
    {
        return [
            'result',
            'code'
        ];
    }

    /**
     * test_user_can_register
     *
     * @return void
     */
    public function test_user_can_register() {
        $body = [
            'name' => 'quan123xxxx',
            'email' => 'quan123xxxx@gmail.com',
            'password' => 'secret',
            'password_confirmataion' => 'secret'
        ];
        $response = $this->sendRequest('POST', 'api/auth/signup', $body, self::HEADER_ACCEPT);
        $response->assertStatus(200)
            ->assertJsonStructure($this->json_structure_user_register());
    }
}
