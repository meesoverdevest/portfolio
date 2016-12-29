@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Periods</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/periods/create') }}" class="btn btn-primary btn-xs" title="Add New period"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Period </th><th> Year Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($periods as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->period }}</td><td>{{ $item->year->year }}</td>
                                        <td>
                                            <a href="{{ url('/admin/periods/' . $item->id) }}" class="btn btn-success btn-xs" title="View period"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/periods/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit period"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/periods', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete period" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete period',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $periods->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection