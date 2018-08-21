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
        $response = $this->json('PATCH', '/api/profile', $body);
        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Top',
                'email' => 'quan@gmail.com',
                'gender' => '1',
                'dob' => '1995-02-22',
                'phone' => '0123456781',
                'address' => 'Da Nang',
            ])
            ->assertJsonStructure($this->json_structure_user_update_profile_success());
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
        $response = $this->json('PATCH', '/api/profile', $body);
        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Top',
                'email' => 'quan@gmail.com',
                'gender' => '1',
                'dob' => '1995-02-22',
                'phone' => '0123456781',
                'address' => 'Da Nang',
            ])
            ->assertJsonStructure($this->json_structure_user_update_profile_success());
    }
}
