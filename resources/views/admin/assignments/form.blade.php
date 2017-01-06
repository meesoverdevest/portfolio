<div class="form-group {{ $errors->has('assignment') ? 'has-error' : ''}}">
    {!! Form::hidden('course_id', $course->id) !!}
    {!! Form::label('assignment', 'Assignment', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('assignment', null, ['class' => 'form-control']) !!}
        {!! $errors->first('assignment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>