<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UsersApiController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Adds global scope to sort release date from most recent
        $data = User::with('movies')->findOrFail($user);
        return $data->toJson();
    }
}
