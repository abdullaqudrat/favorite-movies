<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Adds global scope to sort release date from most recent
use App\Scopes\ReleaseDateScope;

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

    public function years_ago()
    {
        return date('Y', strtotime(now()))-date('Y', strtotime($this->release_date));
    }


    // Adds global scope to sort release date from most recent
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ReleaseDateScope);
    }
}
