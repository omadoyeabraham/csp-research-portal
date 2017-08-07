@extends('layouts.baseAdmin')

@section('content')
<div class="containerr">

    <h1>FullHalfYearReport {{ $fullhalfyearreport->id }}
        <a href="{{ url('full-half-year-report/' . $fullhalfyearreport->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit FullHalfYearReport"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['fullhalfyearreport', $fullhalfyearreport->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete FullHalfYearReport',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $fullhalfyearreport->id }}</td>
                </tr>
                <tr><th> Id </th><td> {{ $fullhalfyearreport->id }} </td></tr><tr><th> File Url </th><td> {{ $fullhalfyearreport->file_url }} </td></tr><tr><th> Report Type </th><td> {{ $fullhalfyearreport->report_type }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
