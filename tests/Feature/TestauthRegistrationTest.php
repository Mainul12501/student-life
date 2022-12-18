<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestauthRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('testauth/register');

        $response->assertStatus(200);
    }

    public function test_new_testauths_can_register()
    {
        $response = $this->post('testauth/register', [
            'name' => 'Test Testauth',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('testauth');
        $response->assertRedirect(route('testauth.dashboard'));
    }
}
