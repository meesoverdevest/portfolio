<div class="form-group {{ $errors->has('course') ? 'has-error' : ''}}">
    {!! Form::label('course', 'Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('course', null, ['class' => 'form-control']) !!}
        {!! $errors->first('course', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('completed') ? 'has-error' : ''}}">
    {!! Form::label('completed', 'Completed', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('completed', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('completed', '0', true) !!} No</label>
</div>
        {!! $errors->first('completed', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('grade') ? 'has-error' : ''}}">
    {!! Form::label('grade', 'Grade', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('grade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('grade', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
    {!! Form::label('periods', 'Period', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('period', isset($periods) ? $periods : null, ['class' => 'form-control']) !!}
        {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>