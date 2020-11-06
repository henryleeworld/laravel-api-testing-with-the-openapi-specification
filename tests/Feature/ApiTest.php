<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spectator\Spectator;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Spectator::using('test.v1.json');
        $response = $this->postJson('/api/register', [
            'name'       => '李亨利',
            'email'      => 'henry.' . rand(1, 1000) . '@gmail-' . rand(1, 1000) . '.com',
            'password'   => 'password',
            'c_password' => 'password',
        ]);
        $response->assertStatus(200);
    }
}
