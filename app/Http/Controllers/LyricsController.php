<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class LyricsController extends Controller
{
    public function search()
    {
        return view('search');
    }

    public function song(Request $request, $id)
    {
        $song = Song::find($id);

        return view('lyrics', compact('song'));
    }
}
