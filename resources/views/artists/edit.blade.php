@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Edit Artist {{ $artist->id }}</h1>
    <hr> 

    <div class="col-sm-6">

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    {!! Form::model($artist, ['route' => ['artists.update', $artist->id], 'files' => true, 'method' => 'PUT']) !!}

        @include('artists.form')

        <hr>
        
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    </div>

</div> 

@endsection