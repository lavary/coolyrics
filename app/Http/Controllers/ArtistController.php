<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use Session;

class ArtistController extends Controller
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
        $artists = Artist::paginate(25);

        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
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
        
            'name'  => 'required'
        ]);

        $requestData = $request->all();
          
        if($request->hasFile('photo')) {
                
            $file = request()->file('photo');
            $file->store('artists', 'public');    
            
            $requestData['photo'] = $file->hashName();

        }

        Artist::create($requestData);

        Session::flash('flash_message', 'Artist added!');

        return redirect()->route('artists.index');
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
        $artist = artist::findOrFail($id);

        return view('artists.edit', compact('artist'));
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
        
            'name' => 'required',
        ]);

        $requestData = $request->all();
        $artist = Artist::findOrFail($id);

        if($request->hasFile('photo')) {
            
            \File::delete(storage_path('app/artists/'. $artist->photo));
            
            $file = request()->file('photo');         
            $file->store('artists', 'public');
            
            $requestData['photo'] = $file->hashName();

        }

        
        $artist->update($requestData);

        Session::flash('flash_message', 'Aritst information updated!');

        return redirect()->route('artists.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artist::destroy($id);

        Session::flash('flash_message', 'Aritst deleted!');

        return redirect()->route('artists.index');
    }
}
