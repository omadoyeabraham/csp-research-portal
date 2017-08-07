@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>ResearchReport {{ $researchreport->id }}
        <a href="{{ url('research-report/' . $researchreport->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ResearchReport"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['researchreport', $researchreport->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete ResearchReport',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $researchreport->id }}</td>
                </tr>
                <tr><th> Ticker Id </th><td> {{ $researchreport->ticker_id }} </td></tr><tr><th> Report Name </th><td> {{ $researchreport->report_name }} </td></tr><tr><th> Date Of Publication </th><td> {{ $researchreport->date_of_publication }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
