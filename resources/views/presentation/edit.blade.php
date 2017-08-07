@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Edit Presentation {{-- $presentation->id --}}</h1>

     <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
             @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {!! Form::model($presentation, [
        'method' => 'PATCH',
        'url' => ['/presentation', $presentation->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}
 <div class="form-group {{ $errors->has('ticker_id') ? 'has-error' : ''}}">
                {!! Form::label('ticker_id', 'Company Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="ticker_id" value="{{ old('ticker_id') }}" class="form-control" placeholder="select company name">
                        @foreach($tickers as $ticker)
                            @if ($presentation->ticker_id == $ticker->id)
                                  <option value="{{ $ticker->id }}" selected>{{ $ticker->ticker }}</option>
                            @else
                                  <option value="{{ $ticker->id }}">{{ $ticker->ticker }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('report_name') ? 'has-error' : ''}}">
                {!! Form::label('report_name', 'Report Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('report_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('report_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('', 'Uploaded File Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="" value="{{ $oldFileName }}" readonly="true">  
                </div>
            </div>
           
              <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                {!! Form::label('file', 'New File[Optional]' , ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('file', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                </div>
            </div>



        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    

</div>
@endsection