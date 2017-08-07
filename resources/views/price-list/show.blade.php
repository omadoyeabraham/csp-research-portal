@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>PriceList {{ $pricelist->id }}
        <a href="{{ url('price-list/' . $pricelist->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit PriceList"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['pricelist', $pricelist->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete PriceList',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $pricelist->id }}</td>
                </tr>
                <tr><th> File Url </th><td> {{ $pricelist->file_url }} </td></tr><tr><th> Report Type </th><td> {{ $pricelist->report_type }} </td></tr><tr><th> Report Name </th><td> {{ $pricelist->report_name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
