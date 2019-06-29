<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Movie;

class UserShowEndpointTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanGetJsonOfFavoriteMovies()
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

        $expected = [[
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'movies'=>[
                ['id'=>$movie_3->id,
                'title'=>$movie_3->title,
                'release_date'=>$movie_3->release_date],
                ['id'=>$movie_5->id,
                'title'=>$movie_5->title,
                'release_date'=>$movie_5->release_date],
                ['id'=>$movie_1->id,
                'title'=>$movie_1->title,
                'release_date'=>$movie_1->release_date],
                ['id'=>$movie_2->id,
                'title'=>$movie_2->title,
                'release_date'=>$movie_2->release_date],
                ['id'=>$movie_4->id,
                'title'=>$movie_4->title,
                'release_date'=>$movie_4->release_date],
                ]
            ]
        ];
        $response = $this->call('GET', "/api/users/{$user->id}",[],[],[],["HTTP_Authorization" => "Basic " . base64_encode($user->username . ":" . "password"),
        "PHP_AUTH_USER" => $user->email,
        "PHP_AUTH_PW" => "password"]);
        
        $response->assertStatus(200)
            ->assertJson($expected);
    }
    public function testUserCantGetJsonOfFavoriteMoviesWithoutBasicAuth()
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

        $response = $this->json('GET', "/api/users/{$user->id}");
        
        $response->assertStatus(401);
    }
}
