@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Edit Song</h1>
    <hr>

    <div class="col-sm-6">

    
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    {!! Form::model($song, ['route' => ['songs.update', $song->id], 'files' => true, 'method' => 'PUT']) !!}

        @include('songs.form')

        <hr>
        
        {!! Form::submit('Edit Song', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    </div>

</div> 

@endsection