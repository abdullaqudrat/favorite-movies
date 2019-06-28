<?php

namespace Tests\Feature\feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserShowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserShowRoute()
    {
        $user = factory(User::class)->create();

        $response = $this->get("/users/{$user->id}");

        // $response->dump();
        $response->assertStatus(200);
    }
}
