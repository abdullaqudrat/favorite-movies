<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            // Adds global scope to sort release date from most recent
            $movies = $user->movies;
            return view('users.show', compact('user', 'movies'));
        } else {
            return view('notfound');
        }
    }
}
