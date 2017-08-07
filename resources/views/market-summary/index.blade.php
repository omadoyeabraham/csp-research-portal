@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Market Summaries <a href="{{ url('/market-summary/create') }}" class="btn btn-primary btn-xs" title="Add New MarketSummary"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">

    <!--div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @if(session()->has('statusDanger') )
                      <div class="alert alert-danger">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: rgb(26,33,85)">&times;</a>
                         {{ session('statusDanger') }}
                      </div>
               @endif

               @if(session()->has('statusSuccess') )
                      <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: rgb(26,33,85)">&times;</a>
                         {{ session('statusSuccess') }}
                      </div>
               @endif
        </div>
    </div-->

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                      <th></th>
                    <th> Report Name </th>
                    <th> Report Date</th
                    ><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($marketsummary as $item)
                <tr>
                     <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->report_name }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        <!--a href="{{ url('/market-summary/' . $item->id) }}" class="btn btn-success btn-xs" title="View MarketSummary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/market-summary/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MarketSummary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/market-summary', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete MarketSummary" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete MarketSummary',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $marketsummary->render() !!} </div>
    </div>

</div>
@endsection
