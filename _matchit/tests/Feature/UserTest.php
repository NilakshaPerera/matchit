<?php

namespace Tests\Feature;

use Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;


class UserTest extends TestCase
{

    use RefreshDatabase;

    public function testLoginPost(){

       

        // $response = $this->get(url('/'));

        // $response->assertStatus(200);

        // Session::start();
        // $response = $this->post(url('login') , [
        //     'email' => 'badUsername@gmail.com',
        //     'password' => 'badPass',
        //     '_token' => csrf_token()
        // ]);

        // $this->assertEquals(200, $response->getStatusCode());
        // $this->assertEquals('auth.login', $response->original->name());

    }


}
