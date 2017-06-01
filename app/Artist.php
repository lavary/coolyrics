<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Artist extends Model
{
    use Searchable;

    protected $fillable = ['name', 'genres', 'years_active', 'photo', 'bio'];

    public function songs()
    {
        return $this->hasMany('\App\Song');
    }

}
