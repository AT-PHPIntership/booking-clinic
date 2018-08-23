<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Passport\Passport;

class UserLogoutTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        Passport::actingAs(factory(\App\User::class)->create());
    }

    /**
     * Test user logout.
     *
     * @return void
     */
    public function test_user_logout_success()
    {
        $response = $this->json('POST', '/api/logout');
        $response->assertStatus(200)
            ->assertJson([
                "result" => [
                    "Successfully logged out"
                ],
                "code" => 200
            ]);
    }
}
