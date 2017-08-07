@extends('layouts.baseAdmin')

@section('content')
<div class="containerr">

    <h1>CorporateResult {{ $corporateresult->id }}
        <a href="{{ url('corporate-result/' . $corporateresult->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CorporateResult"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['corporateresult', $corporateresult->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete CorporateResult',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $corporateresult->id }}</td>
                </tr>
                <tr><th> Report Date </th><td> {{ $corporateresult->report_date }} </td></tr><tr><th> Report Period </th><td> {{ $corporateresult->report_period }} </td></tr><tr><th> Turnover </th><td> {{ $corporateresult->turnover }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
