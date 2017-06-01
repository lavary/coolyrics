<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name') !!}            
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('genres') ? 'has-error' : ''}}">
    {!! Form::label('genres', 'Genres') !!}           
    {!! Form::text('genres', null, ['class' => 'form-control']) !!}
    {!! $errors->first('genres', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('years_active') ? 'has-error' : ''}}">
    {!! Form::label('years_active', 'Years Active') !!}           
    {!! Form::text('years_active', null, ['class' => 'form-control']) !!}
    {!! $errors->first('years_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('bio') ? 'has-error' : ''}}">
    {!! Form::label('bio', 'Biography') !!}           
    {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => 6]) !!}
    {!! $errors->first('bio', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', 'Photo') !!}         
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>