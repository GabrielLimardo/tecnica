<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUsersTest extends TestCase
{

    protected static $id_user;
    protected static $token;

    public function test_login()
    {
        $response = $this->post('/api/auth/login',[
            'email'=>'hola@gmail.com',
            'password'=>'1234',
            'name'=>'hola',
        ]);
        self::$token = 'Bearer '. $response['access_token'];
        $response->assertStatus(200);
    }
    public function test_index()
    {   
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/auth/apiuser');

        $response->assertStatus(200);
    }
    public function test_store()
    {

        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('POST', '/api/auth/apiuser', [
            'name'=>'marcelo',
            'email'=>'holasd@gmail.com',
            'password'=>123456789,
            'retype_password'=>123456789
        ]);

        self::$id_user = $response['id']; 
        $response->assertStatus(200);
      
    }

    public function test_show()
    {
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/auth/apiuser/'.self::$id_user);

        $response->assertStatus(200);
    }

    public function test_update()
    {
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('PUT', '/api/auth/apiuser/'.self::$id_user, [
            'name'=>'kaka',
        ]);
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->delete('/api/auth/apiuser/'.self::$id_user);

        $response->assertStatus(200);

    }


}
