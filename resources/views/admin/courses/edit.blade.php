@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit course {{ $course->id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="col-md-12">
                            <p class="help-block">The currently selected period is: {{ $course->getPeriod()->period }} from year {{ $course->getPeriod()->year->year }}</p>
                        </div>

                        {!! Form::model($course, [
                            'method' => 'PATCH',
                            'url' => ['/admin/courses', $course->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.courses.form', ['submitButtonText' => 'Update', 'periods' => $periods])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection