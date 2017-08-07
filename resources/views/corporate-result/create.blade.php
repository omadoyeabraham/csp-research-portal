@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Upload A New Corporate Result</h3>
    <hr/>
    
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
   
    {!! Form::open(['url' => '/corporate-result', 'class' => 'form-horizontal', 'files' => true]) !!}
            
           
            <div class="form-group {{ $errors->has('ticker_id') ? 'has-error' : ''}}">
                {!! Form::label('ticker_id', 'Company Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="ticker_id" value="{{ old('ticker_id') }}" class="form-control" placeholder="select company name">
                            <option value="" disabled selected hidden>Select the company name</option>
                            
                        @foreach($tickers as $ticker)
                            <option value="{{ $ticker->id }}"> {{ $ticker->ticker }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--div class="form-group {{ $errors->has('report_name') ? 'has-error' : ''}}">
                {!! Form::label('report_name', 'Report Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('report_name', null, ['class' => 'form-control' ]) !!}
                    {!! $errors->first('report_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->
            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Report Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('report_period') ? 'has-error' : ''}}">
                {!! Form::label('report_period', 'Report Period', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('report_period', null, ['class' => 'form-control', 'placeholder' => 'E.G. FY-2016-ACCESS-BANK-PLC']) !!}
                    {!! $errors->first('report_period', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('turnover') ? 'has-error' : ''}}">
                {!! Form::label('turnover', 'Turnover', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('turnover', null, ['class' => 'form-control','step'=>'any']) !!}
                    {!! $errors->first('turnover', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dividend') ? 'has-error' : ''}}">
                {!! Form::label('dividend', 'Dividend', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('dividend', null, ['class' => 'form-control','step'=>'any']) !!}
                    {!! $errors->first('dividend', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pbt') ? 'has-error' : ''}}">
                {!! Form::label('pbt', 'PBT', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('pbt', null, ['class' => 'form-control','step'=>'any']) !!}
                    {!! $errors->first('pbt', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pat') ? 'has-error' : ''}}">
                {!! Form::label('pat', 'PAT', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('pat', null, ['class' => 'form-control','step'=>'any']) !!}
                    {!! $errors->first('pat', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!--div class="form-group {{ $errors->has('gross_earnings') ? 'has-error' : ''}}">
                {!! Form::label('gross_earnings', 'Gross Earnings', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('gross_earnings', null, ['class' => 'form-control','step'=>'any']) !!}
                    {!! $errors->first('gross_earnings', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->
            <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                {!! Form::label('file', 'File', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('file', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Upload', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}


</div>
@endsection