@extends('layouts.basic')

<div id="lyrics-container" class="text-center">  
    <div id="lyrics-header">
        <h1>{{$song->title}}</h1>
        <span id="lyrics-album-details">
            {{$song->artist->name}} - {{$song->album}} Album
        </span>  
        <div id="lyrics-thumbnail">
            <img src="{{Storage::url('artists/' . $song->artist->photo)}}">
            <div id="lyrics-youtube-link">
                <a href="{{$song->youtube_link}}"><i class="glyphicon glyphicon-play"></i> Watch on Youtube</a>
            </div>
        </div><!--/#lyrics-thumbnail-->
    </div><!--/#lyrics-header-->
    <div id="lyrics-content">
        <p><strong>"{{$song->title}}"</strong></p>
        <p>{!! nl2br($song->lyrics) !!}</p>
    </div><!--/#lyrics-content-->
</div> 