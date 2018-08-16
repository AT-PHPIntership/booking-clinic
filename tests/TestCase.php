<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;
    protected $token;

    public function setUp() {
        parent::setUp();
        // Artisan::call('passport:install');
        $this->artisan('migrate');
        $this->artisan('passport:install');
        // $this->user = factory(\App\User::class)->create();
        // $this->token =  $this->user->createToken('token')->accessToken;
    }

    /**
     * Get json response
     *
     * @return json
     */
    public function sendRequest($method, $url, $data = [], $header = [])
    {
        if ($header) {
            return $this->json($method, $url, $data, $header);
        }
        return $this->json($method, $url, $data, ['Accept' => 'application/json', 'Authorization' => 'Bearer '.$this->token]);
    }
}
