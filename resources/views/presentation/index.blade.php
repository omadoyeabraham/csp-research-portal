@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Presentations <a href="{{ url('/presentation/create') }}" class="btn btn-primary btn-xs ml20" title="Add New Presentation"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>

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
                    <th> Company Name</th>
                    <th> Date </th>
                    <th> Report Name </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($presentation as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->company_name }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->report_name }}</td>
                    <td>
                        <!--a href="{{ url('/presentation/' . $item->id) }}" class="btn btn-success btn-xs" title="View Presentation"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/presentation/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Presentation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/presentation', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Presentation" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Presentation',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $presentation->render() !!} </div>
    </div>

</div>
@endsection
