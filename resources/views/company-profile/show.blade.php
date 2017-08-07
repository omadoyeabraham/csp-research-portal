@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>CompanyProfile {{ $companyprofile->id }}
        <a href="{{ url('company-profile/' . $companyprofile->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CompanyProfile"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['companyprofile', $companyprofile->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete CompanyProfile',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $companyprofile->id }}</td>
                </tr>
                <tr><th> Ticker Id </th><td> {{ $companyprofile->ticker_id }} </td></tr><tr><th> Company Name </th><td> {{ $companyprofile->company_name }} </td></tr><tr><th> Ticker </th><td> {{ $companyprofile->ticker }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
