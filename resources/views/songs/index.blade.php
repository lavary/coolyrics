@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Songs <a href="{{ route('songs.create') }}" class="btn btn-success btn-xs pull-right" title="Add New Song">New Song</a></h1>
    
    <hr>

    <div class="table">
        <table class="table table-striped table-hover table-condensed">
            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
            @forelse($songs as $item)
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('songs.edit', $item->id) }}">{{ $item->title }}</a></td>
                    <td>{{ $item->album }}</td>
                    <td>{{ $item->artist->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('songs.edit', $item->id) }}" class="btn btn-warning btn-xs" title="Edit Song">Edit</a>                       
                        {!! Form::open(['method'=>'DELETE', 'route' => ['songs.destroy', $item->id], 'style' => 'display: inline']) !!}
                            
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Song" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-default btn-xs',
                                    'title' => 'Delete Song',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        
                        {!! Form::close() !!}
                    </td>

                </tr>
             @empty
                <tr><td colspan="6">No songs added yet!  <br> <a class="btn btn-xs btn-success" href="{{ route('songs.create') }}">Add a Song</a></td></tr>
            @endforelse
            </tbody>

        </table>
        
        <div class="pagination-wrapper"> {!! $songs->render() !!} </div>

    </div>

</div>
@endsection
