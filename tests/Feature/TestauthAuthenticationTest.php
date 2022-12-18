<?php

namespace Tests\Feature;

use App\Models\Testauth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestauthAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('testauth/login');

        $response->assertStatus(200);
    }

    public function test_testauths_can_authenticate_using_the_login_screen()
    {
        $testauth = Testauth::factory()->create();

        $response = $this->post('testauth/login', [
            'email' => $testauth->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('testauth');
        $response->assertRedirect(route('testauth.dashboard'));
    }

    public function test_testauths_can_not_authenticate_with_invalid_password()
    {
        $testauth = Testauth::factory()->create();

        $this->post('testauth/login', [
            'email' => $testauth->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('testauth');
    }
}
