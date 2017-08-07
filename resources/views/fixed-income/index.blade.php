@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Fixed Income Entries<a href="{{ url('/fixed-income/create') }}" class="btn btn-primary btn-xs" title="Add New FixedIncome"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>

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
                    <th>S.No</th>
                    <th> Date </th>
                    <th> FI 5Y Opening Yield </th>
                    <th> FI 5Y Closing Yield </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($fixedincome as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->FI_5Y_opening_yield }}</td>
                    <td>{{ $item->FI_5Y_closing_yield }}</td>
                    <td>
                        <!--a href="{{ url('/fixed-income/' . $item->id) }}" class="btn btn-success btn-xs" title="View FixedIncome"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/fixed-income/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit FixedIncome"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/fixed-income', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete FixedIncome" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete FixedIncome',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $fixedincome->render() !!} </div>
    </div>

</div>
@endsection
