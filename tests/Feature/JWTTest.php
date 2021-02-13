<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JWTTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_login_usign_jwt()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => '@plenarylabs',
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function test_refresh_usign_jwt()
    {
        $user = User::factory()->create();

        $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => '@plenarylabs',
        ]);

        $response = $this->post('/api/auth/refresh');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_logout_using_jwt()
    {
        $user = User::factory()->create();

        $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => '@plenarylabs',
        ]);

        $response = $this->post('/api/auth/logout');

        $response->assertStatus(200);
    }
}
