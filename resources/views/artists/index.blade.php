@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Artists <a href="{{ route('artists.create') }}" class="btn btn-success btn-xs pull-right" title="Add New Artist">New Artist</a></h1>
    
    <hr>

    <div class="table">
        <table class="table table-striped table-hover table-condensed">
            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Genres</th>
                    <th>Years Active</th>
                    <th>Songs</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
            @forelse($artists as $item)
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('artists.edit', $item->id) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->genres }} </td>
                    <td>{{ $item->years_active }}</td>
                    <td>{{ count($item->songs) }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('artists.edit', $item->id) }}" class="btn btn-warning btn-xs" title="Edit Artist">Edit</a>                       
                        {!! Form::open(['method'=>'DELETE', 'route' => ['artists.destroy', $item->id], 'style' => 'display: inline']) !!}
                            
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Artist" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-default btn-xs',
                                    'title' => 'Delete Artist',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        
                        {!! Form::close() !!}
                    </td>

                </tr>
             @empty
                <tr><td colspan="6">No artist added yet!  <br> <a class="btn btn-xs btn-success" href="{{ route('artists.create') }}">Add an Artist</a></td></tr>
            @endforelse
            </tbody>

        </table>
        
        <div class="pagination-wrapper"> {!! $artists->render() !!} </div>

    </div>

</div>
@endsection
