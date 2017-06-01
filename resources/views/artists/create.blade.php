@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Add Artist</h1>
    <hr>

    <div class="col-sm-6">

    
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    {!! Form::open(['route' => 'artists.store','files' => true]) !!}

        @include('artists.form')

        <hr>
        
        {!! Form::submit('Add Artist', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    </div>

</div> 

@endsection