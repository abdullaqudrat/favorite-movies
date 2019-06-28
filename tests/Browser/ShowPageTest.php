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
        $movie_1 = factory(Movie::class)->create(["release_date"=>"1997-02-17"]);
        $movie_2 = factory(Movie::class)->create(["release_date"=>"1988-11-11"]);
        $movie_3 = factory(Movie::class)->create(["release_date"=>"2018-02-11"]);
        $movie_4 = factory(Movie::class)->create(["release_date"=>"1956-02-28"]);
        $movie_5 = factory(Movie::class)->create(["release_date"=>"2016-06-30"]);
        $user->movies()->attach([
            $movie_1->id,
            $movie_2->id,
            $movie_3->id,
            $movie_4->id,
            $movie_5->id,
        ]);

        $this->browse(function ($browser) use ($user, $movie_1, $movie_2, $movie_3, $movie_4, $movie_5) {
            $browser->visit("/users/{$user->id}")
            ->assertSee($user->name)
            ->assertSee($movie_1->title)
            ->assertSee("Released in: " . date('Y', strtotime($movie_1->release_date)))
            ->assertSee("{$movie_1->years_ago()} years ago")
            ->assertSee($movie_2->title)
            ->assertSee("Released in: " . date('Y', strtotime($movie_2->release_date)))
            ->assertSee("{$movie_2->years_ago()} years ago")
            ->assertSee($movie_3->title)
            ->assertSee("Released in: " . date('Y', strtotime($movie_3->release_date)))
            ->assertSee("{$movie_3->years_ago()} year ago")
            ->assertSee($movie_3->title)
            ->assertSee("Released in: " . date('Y', strtotime($movie_4->release_date)))
            ->assertSee("{$movie_4->years_ago()} years ago")
            ->assertSee($movie_5->title)
            ->assertSee("Released in: " . date('Y', strtotime($movie_5->release_date)))
            ->assertSee("{$movie_5->years_ago()} years ago")
            ->assertValue(".movie-title-1", $movie_3->id)
            ->assertValue(".movie-title-2", $movie_5->id)
            ->assertValue(".movie-title-3", $movie_1->id)
            ->assertValue(".movie-title-4", $movie_2->id)
            ->assertValue(".movie-title-5", $movie_4->id);
        });
    }
}
