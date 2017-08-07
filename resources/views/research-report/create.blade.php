@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Create A New Research Report</h3>
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

    {!! Form::open(['url' => '/research-report', 'class' => 'form-horizontal', 'files' => true]) !!}
            
            <div class="form-group {{ $errors->has('report_type') ? 'has-error' : ''}}">
                {!! Form::label('report_type', 'Report Type', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="report_type" value="{{ old('report_type') }}" class="form-control" placeholder="Choose a report type">
                            <option value="" disabled selected hidden>Select the report type</option>
                            <!--option value="0" >Not Applicable</option-->
                            <option value="Company Update"> Company Update </option>
                            <option value="Sector Report"> Sector Report </option>
                            <option value="Economic Update"> Economic Update </option>
                    </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('report_name') ? 'has-error' : ''}}">
                {!! Form::label('report_name', 'Report Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('report_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('report_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('ticker_id') ? 'has-error' : ''}}">
                {!! Form::label('ticker_id', 'Company Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select name="ticker_id" value="{{ old('ticker_id') }}" class="form-control" placeholder="select company name">
                            <option value="" disabled selected hidden>Select the company name</option>
                            <option value="0" >Not Applicable</option>
                        @foreach($tickers as $ticker)
                            <option value="{{ $ticker->id }}"> {{ $ticker->ticker }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date Of Publication', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
            

            <!--div class="form-group {{ $errors->has('report_type') ? 'has-error' : ''}}">
                {!! Form::label('report_type', 'Report Type', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('report_type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('report_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->

            <div class="form-group {{ $errors->has('preview') ? 'has-error' : ''}}">
                {!! Form::label('preview', 'Preview', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('preview', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('preview', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
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