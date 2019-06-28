<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;
use App\Movie;

class UserShowPageTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function testUserCanSeeMovieListPageTest()
    {
        $user = factory(User::class)->create();
        $movie_1 = factory(Movie::class)->create;


        $this->browse(function (Browser $browser) use ($user, $movie_1) {
            $browser->visit("/users/{$user->id}")
                ->assertSee($user->name)
                ->assertSee($movie_1->title);
        });
    }
}
