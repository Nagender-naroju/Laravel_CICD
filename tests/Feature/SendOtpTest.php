<?php

namespace Tests\Feature;


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SendOtpTest extends TestCase
{
     use RefreshDatabase;
    /**
     * A basic feature test example.
     */
   public function test_send_otp_success()
    {
        $response = $this->postJson('/api/send-otp', [
            'number' => '9876543210'
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'OTP sent Successfully'
                 ]);

        $this->assertDatabaseHas('otp_verifications', [
            'number' => '9876543210'
        ]);
    }
}
