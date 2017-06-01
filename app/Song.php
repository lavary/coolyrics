<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Song extends Model
{
    use Searchable;
    
    protected $fillable = ['title', 'album', 'lyrics', 'youtube_link'];

    public function toSearchableArray()
    {
        $genres = array_map(function($item) {
            return trim($item);
        }, explode(',', $this->artist->genres));

        return array_merge( $this->toArray(), ['artist' => $this->artist->name, 'photo' => $this->artist->photo, 'genres' => $genres]);
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
