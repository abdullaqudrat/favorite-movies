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
        $movie_1 = factory(Movie::class)->create();
        $movie_2 = factory(Movie::class)->create();
        $user->movies()->attach([
            $movie_1->id,
            $movie_2->id
        ]);


        $this->browse(function (Browser $browser) use ($user, $movie_1, $movie_2) {
            $browser->visit("/users/{$user->id}")
                ->assertSee($user->name)
                ->assertSee($movie_1->title)
                ->assertSee($movie_2->title);
        });
    }
}
