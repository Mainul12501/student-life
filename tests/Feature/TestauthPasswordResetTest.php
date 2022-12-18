<?php

namespace Tests\Feature;

use App\Models\Testauth;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class TestauthPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('testauth/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $testauth = Testauth::factory()->create();

        $response = $this->post('testauth/forgot-password', [
            'email' => $testauth->email,
        ]);

        Notification::assertSentTo($testauth, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $testauth = Testauth::factory()->create();

        $response = $this->post('testauth/forgot-password', [
            'email' => $testauth->email,
        ]);

        Notification::assertSentTo($testauth, ResetPassword::class, function ($notification) {
            $response = $this->get('testauth/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $testauth = Testauth::factory()->create();

        $response = $this->post('testauth/forgot-password', [
            'email' => $testauth->email,
        ]);

        Notification::assertSentTo($testauth, ResetPassword::class, function ($notification) use ($testauth) {
            $response = $this->post('testauth/reset-password', [
                'token' => $notification->token,
                'email' => $testauth->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
