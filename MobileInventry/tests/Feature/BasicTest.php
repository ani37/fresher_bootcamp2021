<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_insertUser()
    {
        $response = $this->json('POST','/users',[
            'username'=>'pqx', 'email'=>'pqr@gmail.com', 'phone' =>'1342151431']);
        $response
            -> assertStatus(201);

    }

    public function test_getUser()
    {
        $response = $this->json('GET', '/users');

        $response->assertStatus(200);

    }

    public function test_getUserByUsername()
    {
        $response = $this->json('GET', '/users/username/pqx');

        $response->assertStatus(200);
    }

    public function test_getUserByEmail()
    {
        $response = $this->json('GET', '/users/email/pqr@gmail.com');

        $response->assertStatus(200);
    }

    public function test_getUserByPhone()
    {
        $response = $this->json('GET', '/users/phone/1342151431');

        $response->assertStatus(200);
    }

    public function test_deleteUserByPhone()
    {
        $response = $this->json('DELETE', '/users/phone/1342151431');

        $response->assertStatus(200);
    }



}
