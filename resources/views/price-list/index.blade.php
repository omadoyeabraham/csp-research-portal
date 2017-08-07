@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Pricelists <a href="{{ url('/price-list/create') }}" class="btn btn-primary btn-xs ml20" title="Add New PriceList "><span class="glyphicon glyphicon-plus " aria-hidden="true"/></a></h1>
    
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

    <div class="table">
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
            @foreach($pricelist as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->report_name }}</td>
                    <td>{{ $item->date }}</td>
                  
                    <td>
                        <!--a href="{{ url('/price-list/' . $item->id) }}" class="btn btn-success btn-xs" title="View PriceList"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/price-list/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit PriceList"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/price-list', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete PriceList" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete PriceList',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $pricelist->render() !!} </div>
    </div>

</div>
@endsection
