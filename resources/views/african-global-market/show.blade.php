@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h1>AfricanGlobalMarket {{ $africanglobalmarket->id }}
        <a href="{{ url('african-global-market/' . $africanglobalmarket->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit AfricanGlobalMarket"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['africanglobalmarket', $africanglobalmarket->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete AfricanGlobalMarket',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $africanglobalmarket->id }}</td>
                </tr>
                <tr><th> Date </th><td> {{ $africanglobalmarket->date }} </td></tr><tr><th> JAISH INDEX </th><td> {{ $africanglobalmarket->JAISH_INDEX }} </td></tr><tr><th> JAISH CHANGE </th><td> {{ $africanglobalmarket->JAISH_CHANGE }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
