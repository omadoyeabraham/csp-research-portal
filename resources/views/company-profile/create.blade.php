@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Create A New Company Profile</h3>
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

    {!! Form::open(['url' => '/company-profile', 'class' => 'form-horizontal', 'files' => true]) !!}
        
              
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

            <div class="form-group {{ $errors->has('market_classification') ? 'has-error' : ''}}">
                {!! Form::label('market_classification', 'Market Classification', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('market_classification', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('market_classification', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sector') ? 'has-error' : ''}}">
                {!! Form::label('sector', 'Sector', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sector', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sector', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sub_sector') ? 'has-error' : ''}}">
                {!! Form::label('sub_sector', 'Sub Sector', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sub_sector', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sub_sector', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telephone_fax') ? 'has-error' : ''}}">
                {!! Form::label('telephone_fax', 'Telephone / Fax', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('telephone_fax', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telephone_fax', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
                {!! Form::label('website', 'Website', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('website', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('registrar') ? 'has-error' : ''}}">
                {!! Form::label('registrar', 'Registrar', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('registrar', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('registrar', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('company_secretary') ? 'has-error' : ''}}">
                {!! Form::label('company_secretary', 'Company Secretary', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('company_secretary', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('company_secretary', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_listed') ? 'has-error' : ''}}">
                {!! Form::label('date_listed', 'Date Listed', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date_listed', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_listed', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_incorporation') ? 'has-error' : ''}}">
                {!! Form::label('date_of_incorporation', 'Date Of Incorporation', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date_of_incorporation', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_of_incorporation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('board_of_directors') ? 'has-error' : ''}}">
                {!! Form::label('board_of_directors', 'Board Of Directors', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('board_of_directors', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('board_of_directors', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('market_cap') ? 'has-error' : ''}}">
                {!! Form::label('market_cap', 'Market Cap', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('market_cap', null, ['class' => 'form-control', 'step'=>'any']) !!}
                    {!! $errors->first('market_cap', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('shares_outstanding') ? 'has-error' : ''}}">
                {!! Form::label('shares_outstanding', 'Shares Outstanding', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('shares_outstanding', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('shares_outstanding', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ownership_structure') ? 'has-error' : ''}}">
                {!! Form::label('ownership_structure', 'Ownership Structure', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('ownership_structure', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ownership_structure', '<p class="help-block">:message</p>') !!}
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