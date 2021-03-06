@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>MarketSummary {{ $marketsummary->id }}
        <a href="{{ url('market-summary/' . $marketsummary->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MarketSummary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['marketsummary', $marketsummary->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete MarketSummary',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $marketsummary->id }}</td>
                </tr>
                <tr><th> File Url </th><td> {{ $marketsummary->file_url }} </td></tr><tr><th> Report Type </th><td> {{ $marketsummary->report_type }} </td></tr><tr><th> Report Name </th><td> {{ $marketsummary->report_name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
