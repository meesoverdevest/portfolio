<div class="form-group {{ $errors->has('block') ? 'has-error' : ''}}">
    {!! Form::label('block', 'Block', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('block', null, ['class' => 'form-control']) !!}
        {!! $errors->first('block', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('html') ? 'has-error' : ''}}">
    {!! Form::label('html', 'Html', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('html', null, ['class' => 'form-control']) !!}
        {!! $errors->first('html', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>