@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New assignment</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['route' => 'assignments.store', 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('course_id', $course->id) !!}

                        @include ('admin.assignments.form')

                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Attach existing course</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'assignments.assign', 'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('course_id', $course->id) !!}
                        

                            @foreach($extra_assignments as $ass)
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <p>Opdracht: {{ $ass->assignment }}</p>
                                        <p>Beschrijving: {{ $ass->description }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="assignments[{{ $ass->id }}]" id="opt-one {{ $ass->id }}" class="hide-checkbox" value="1">
                                        <label for="opt-one {{ $ass->id }}">Toevoegen</label>
                                         
                                        <input type="radio" name="assignments[{{ $ass->id }}]" id="opt-two {{ $ass->id }}" class="hide-checkbox" value="2" checked="true">
                                        <label for="opt-two {{ $ass->id }}">Niet toevoegen</label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="pagination-wrapper"> {!! $extra_assignments->render() !!} </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    {!! Form::submit('Add assignments', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection