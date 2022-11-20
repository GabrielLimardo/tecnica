<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected static $id;
    protected static $token;

    public function test_login()
    {
        $response = $this->post('/api/auth/login',[
            'email'=>'hola@gmail.com',
            'password'=>'1234',
            'name'=>'hola',
        ]);
        dd($response);
        self::$token = 'Bearer '. $response['access_token'];
        $response->assertStatus(200);
    }

    public function test_index()
    {   
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->get('/api/auth/user');

        $response->assertStatus(200);
    }
    public function test_store()
    {
        $response = $this->withHeaders([
            'Authorization' => self::$token,
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
            'Accept' => 'application/json',
        ])->post('/api/auth/user',[
            'name'=>'hola',
            'email'=>'hola@gmail.com',
            'password'=>123456789,
            'retype_password'=>123456789,
            'age'=>123456789,
            'contry'=>'Argentina',

        ]);
        dd($response->assertStatus(200));
        self::$id = $response->id; 
        $response->assertStatus(200);
    }

    
    // public function test_update()
    // {
    //     $response = $this->put('/user', [
    //         'name'=>'AutomationTesting',
    //     ]);
    //     $response->assertStatus(200);
    // }
    // public function test_show()
    // {
    //     $response = $this->get('/user/'.$this -> id);

    //     $response->assertStatus(200);
    // }
    // public function test_destroy()
    // {
    //     $response = $this->delete('/user/'.$this -> id);

    //     $response->assertStatus(200);
    // }
}
