<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(["email"=>"test2@example.com"])->each(function ($user) {
            $user->movies()->save(factory(App\Movie::class)->make());
            $user->movies()->save(factory(App\Movie::class)->make());
            $user->movies()->save(factory(App\Movie::class)->make());
            $user->movies()->save(factory(App\Movie::class)->make());
            $user->movies()->save(factory(App\Movie::class)->make());
        });
        factory(App\User::class)->create(["email"=>"test@example.com"])->each(function ($user2) {
            $user2->movies()->save(factory(App\Movie::class)->make());
            $user2->movies()->save(factory(App\Movie::class)->make());
            $user2->movies()->save(factory(App\Movie::class)->make());
            $user2->movies()->save(factory(App\Movie::class)->make());
            $user2->movies()->save(factory(App\Movie::class)->make());
        });
    }

}
