@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Full/Half year reports <a href="{{ url('/full-half-year-report/create') }}" class="btn btn-primary btn-xs ml20" title="Add New FullHalfYearReport"><span class="glyphicon glyphicon-plus " aria-hidden="true"/></a></h3>
    
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
                    <th> Report Date </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($fullhalfyearreport as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->report_name }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        <!--a href="{{ url('/full-half-year-report/' . $item->id) }}" class="btn btn-success btn-xs" title="View FullHalfYearReport"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/full-half-year-report/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit FullHalfYearReport"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/full-half-year-report', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete FullHalfYearReport" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete FullHalfYearReport',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $fullhalfyearreport->render() !!} </div>
    </div>

</div>
@endsection
