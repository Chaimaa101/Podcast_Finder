<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $data=[
                            
                "name"=> "lal ",
                "email"=> "lal12@example.com",
                "password"=> "password123",
                "password_confirmation"=> "password123",
                "role"=> "admin"   
        ];
        
        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(200)->assertJson([
             'message' => 'Inscription réussie.',
                
        ]); // success
        


    }

    // /** @test */
    // public function user_can_login()
    // {
    //     // Create user first
    //     $user = User::factory()->create([
    //         'email' => 'login@example.com',
    //         'password' => bcrypt('password')
    //     ]);

    //     $response = $this->postJson('/api/login', [
    //         'email' => 'login@example.com',
    //         'password' => 'password'
    //     ]);

    //     $response->assertStatus(200);
    //     $response->assertJsonStructure([
    //         'message',
    //         'token',
    //         'user'
    //     ]);
    // }

}
