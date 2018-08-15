<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public const HEADER_ACCEPT = ['Accept' => 'application/json'];
    public const HEADER_AUTHORIZATION = ['Authorization' => 'Bear'];

    protected $user;
    protected $token;

    /**
     * Set up TestCase
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = factory(\App\User::class)->create();
        $this->token =$this->user->createToken(__('api/user.access_token'))->accessToken;
    }

    /**
     * Get json response
     *
     * @return json
     */
    public function sendRequest($method, $url, $data = [], $header = []) {
        if ($header) {
            return $this->json($method, $url, $data, $header);
        }
        return $this->json($method, $url, $data, [seft::HEADER_ACCEPT, self::HEADER_AUTHORIZATION]);
    }
}
