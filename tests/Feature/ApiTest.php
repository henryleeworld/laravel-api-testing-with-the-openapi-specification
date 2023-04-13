<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spectator\Spectator;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Spectator::using('test.v1.json');
        // Disable exception handling for all tests in this file
        // $this->withoutExceptionHandling();
        $responses = $this->postJson('/api/register', [
            'name'       => '李亨利',
            'email'      => 'henry.' . rand(1, 1000) . '@gmail-' . rand(1, 1000) . '.com',
            'password'   => '(~M-`u($XIyqv8^',
            'c_password' => '(~M-`u($XIyqv8^',
        ]);
        $responses->assertStatus(200)->assertValidRequest()->assertValidResponse();
    }
}
