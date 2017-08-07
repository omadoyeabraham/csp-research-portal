@extends('layouts.base')

@section('page-content')
<div class="container">

    <h3>MasterTemplate {{ $mastertemplate->id }}
        <a href="{{ url('master-template/' . $mastertemplate->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MasterTemplate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['mastertemplate', $mastertemplate->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete MasterTemplate',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $mastertemplate->id }}</td>
                </tr>
                <tr><th> File </th><td> {{ $mastertemplate->file }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
