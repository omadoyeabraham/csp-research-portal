@extends('layouts.base')

@section('page-content')
<div class="container">

    <h3>Mastertemplate <a href="{{ url('/master-template/create') }}" class="btn btn-primary btn-xs" title="Add New MasterTemplate"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>

    <div class="row">
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
    </div>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> File </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mastertemplate as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->file }}</td>
                    <td>
                        <!--a href="{{ url('/master-template/' . $item->id) }}" class="btn btn-success btn-xs" title="View MasterTemplate"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/master-template/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit MasterTemplate"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/master-template', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete MasterTemplate" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete MasterTemplate',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $mastertemplate->render() !!} </div>
    </div>

</div>
@endsection
