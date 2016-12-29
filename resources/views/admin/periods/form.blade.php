<div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
    {!! Form::label('period', 'Period', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('period', null, ['class' => 'form-control']) !!}
        {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('year_id') ? 'has-error' : ''}}">
    {!! Form::label('year_id', 'Year Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('year_id', isset($year) ? $year : null, ['class' => 'form-control']) !!}
        {!! $errors->first('year_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>