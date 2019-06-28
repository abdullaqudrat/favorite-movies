<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * Users have many through MovieUser.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'movie_user');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'release_date',
    ];
}
