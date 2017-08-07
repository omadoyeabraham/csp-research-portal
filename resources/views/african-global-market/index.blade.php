@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>African/Global Markets <a href="{{ url('/african-global-market/create') }}" class="btn btn-primary btn-xs ml20" title="Add New AfricanGlobalMarket"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th> Date </th>
                    <th> JAISH INDEX </th>
                    <th> JAISH CHANGE </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($africanglobalmarket as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->JAISH_INDEX }}</td>
                    <td>{{ $item->JAISH_CHANGE }}</td>
                    <td>
                        <!--a href="{{ url('/african-global-market/' . $item->id) }}" class="btn btn-success btn-xs" title="View AfricanGlobalMarket"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a-->
                        <a href="{{ url('/african-global-market/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit AfricanGlobalMarket"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/african-global-market', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete AfricanGlobalMarket" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete AfricanGlobalMarket',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $africanglobalmarket->render() !!} </div>
    </div>

</div>
@endsection
