<?php

namespace Tests\Feature;

use App\Models\Testauth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestauthPasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $testauth = Testauth::factory()->create();

        $response = $this->actingAs($testauth, 'testauth')->get('testauth/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $testauth = Testauth::factory()->create();

        $response = $this->actingAs($testauth, 'testauth')->post('testauth/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $testauth = Testauth::factory()->create();

        $response = $this->actingAs($testauth, 'testauth')->post('testauth/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
