<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Artisan::call("migrate:refresh");
        Artisan::call('db:seed');

        $adminUser = [
            'email' => 'admin@gmail.com',
            'password' => '123456'
        ];
        $response = $this->post('/api/v1/auth/login', $adminUser);
        $this->adminToken = $response['access_token'];

    }


}
