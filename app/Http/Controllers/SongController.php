<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;
use App\Artist;
use Session;

class SongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::paginate(25);

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::pluck('name', 'id')->toArray();

        return view('songs.create', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'lyrics' => 'required',
            'artist' => 'required|exists:artists,id',
        ]);

        $artist = Artist::find($request->artist);
        $song   = new Song($request->all());
        
        $artist->songs()->save($song);

        Session::flash('flash_message', 'Song added.');
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artists = Artist::pluck('name', 'id')->toArray();

        $song = Song::find($id);

        return view('songs.edit', compact('song', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        
            'title'     => 'required',
            'lyrics'    => 'required',
            'artist'    => 'required|exists:artists,id',
        ]);

        $artist = Artist::find($request->artist);
        $song   = Song::find($id);

        $song->update($request->all());
        $song->artist()->associate($artist);
        $song->save();

        Session::flash('flash_message', 'Song edited.');
        return redirect()->route('songs.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::destroy($id);

        Session::flash('flash_message', 'Song deleted!');

        return redirect()->route('songs.index');
    }
}
