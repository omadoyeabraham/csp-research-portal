@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>FixedIncome {{ $fixedincome->id }}
        <a href="{{ url('fixed-income/' . $fixedincome->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit FixedIncome"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['fixedincome', $fixedincome->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete FixedIncome',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $fixedincome->id }}</td>
                </tr>
                <tr><th> Date </th><td> {{ $fixedincome->date }} </td></tr><tr><th> FI 5Y Opening Yield </th><td> {{ $fixedincome->FI_5Y_opening_yield }} </td></tr><tr><th> FI 5Y Closing Yield </th><td> {{ $fixedincome->FI_5Y_closing_yield }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
