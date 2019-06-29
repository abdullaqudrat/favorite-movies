<?php

namespace Tests\Feature\feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserControllerShowTest extends TestCase
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

        $response = $this->actingAs($user)->get("/users/{$user->id}");

        $response->assertStatus(200);
    }
}
