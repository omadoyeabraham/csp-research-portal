@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3 class="mr40">Corporate Results <a href="{{ url('/corporate-result/create') }}" class="btn btn-primary btn-xs ml20" title="Add New CorporateResult"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h3>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th> Report Date</th>
                    <th> Instrument</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($corporateresult as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->company_name }}</td>
                    <td>
                        <a href="{{ url('/corporate-result/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CorporateResult"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/corporate-result', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete CorporateResult" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete CorporateResult',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $corporateresult->render() !!} </div>
    </div>

</div>
@endsection
