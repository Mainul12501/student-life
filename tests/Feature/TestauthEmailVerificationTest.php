<?php

namespace Tests\Feature;

use App\Models\Testauth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class TestauthEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $testauth = Testauth::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($testauth, 'testauth')->get('testauth/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $testauth = Testauth::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'testauth.verification.verify',
            now()->addMinutes(60),
            ['id' => $testauth->id, 'hash' => sha1($testauth->email)]
        );

        $response = $this->actingAs($testauth, 'testauth')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($testauth->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('testauth.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $testauth = Testauth::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'testauth.verification.verify',
            now()->addMinutes(60),
            ['id' => $testauth->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($testauth, 'testauth')->get($verificationUrl);

        $this->assertFalse($testauth->fresh()->hasVerifiedEmail());
    }
}
