<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Passport\Passport;

class GetUserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function json_structure_user()
    {
        return [
                'id',
                'name',
                'email',
                'gender',
                'dob',
                'phone',
                'address',
                'created_at',
                'updated_at',
        ];
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function json_structure_unauthenticated()
    {
        return [
            'message'
        ];
    }

    /**
     * test it can get user.
     *
     * @return void
     */
    public function test_it_can_get_user()
    {
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);

        $this->json('GET', '/api/user')
            ->assertStatus(200)
            ->assertJsonStructure($this->json_structure_user())
            ->assertJson([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
    }

    /**
     * test it can not get user without token.
     *
     * @return void
     */
    public function test_it_can_not_get_user_without_token()
    {
        factory(\App\User::class)->create();

        $this->json('GET', '/api/user')
            ->assertStatus(401)
            ->assertJsonStructure($this->json_structure_unauthenticated());
    }
}
