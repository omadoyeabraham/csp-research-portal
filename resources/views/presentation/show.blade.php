@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Presentation {{ $presentation->id }}
        <a href="{{ url('presentation/' . $presentation->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Presentation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['presentation', $presentation->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Presentation',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $presentation->id }}</td>
                </tr>
                <tr><th> Ticker Id </th><td> {{ $presentation->ticker_id }} </td></tr><tr><th> Date </th><td> {{ $presentation->date }} </td></tr><tr><th> Report Name </th><td> {{ $presentation->report_name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
