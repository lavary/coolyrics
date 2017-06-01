<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title') !!}            
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('artist') ? 'has-error' : ''}}">
    {!! Form::label('artist_id', 'Artist') !!}            
    {!! Form::select('artist_id', $artists, null, ['class' => 'form-control', 'placeholder' => 'Select an artist...']) !!}
    {!! $errors->first('artist', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('album') ? 'has-error' : ''}}">
    {!! Form::label('album', 'Album') !!}            
    {!! Form::text('album', null, ['class' => 'form-control']) !!}
    {!! $errors->first('album', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('youtube_link') ? 'has-error' : ''}}">
    {!! Form::label('youtube_link', 'Youtube Link') !!}            
    {!! Form::text('youtube_link', null, ['class' => 'form-control']) !!}
    {!! $errors->first('youtube_link', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('lyrics') ? 'has-error' : ''}}">
    {!! Form::label('lyrics', 'Lyrics') !!}            
    {!! Form::textarea('lyrics', null, ['class' => 'form-control']) !!}
    {!! $errors->first('lyrics', '<p class="help-block">:message</p>') !!}
</div>