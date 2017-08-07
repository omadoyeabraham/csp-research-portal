@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>DividendBonus {{ $dividendbonus->id }}
        <a href="{{ url('dividend-bonus/' . $dividendbonus->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit DividendBonus"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['dividendbonus', $dividendbonus->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete DividendBonus',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $dividendbonus->id }}</td>
                </tr>
                <tr>
                    <th> Ticker Id </th><td> {{ $dividendbonus->ticker_id }} </td></tr><tr><th> Period </th><td> {{ $dividendbonus->period }} </td></tr><tr><th> Dividend </th><td> {{ $dividendbonus->dividend }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
