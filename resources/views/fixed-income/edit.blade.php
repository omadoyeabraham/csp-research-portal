@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Edit Fixed Income Entry</h1>
    
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


    {!! Form::model($fixedincome, [
        'method' => 'PATCH',
        'url' => ['/fixed-income', $fixedincome->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_5Y_opening_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_5Y_opening_yield', 'Fi 5y Opening Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_5Y_opening_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_5Y_opening_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_5Y_closing_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_5Y_closing_yield', 'Fi 5y Closing Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_5Y_closing_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_5Y_closing_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_5Y_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_5Y_change', 'Fi 5y Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_5Y_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_5Y_change', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_10Y_opening_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_10Y_opening_yield', 'Fi 10y Opening Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_10Y_opening_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_10Y_opening_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_10Y_closing_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_10Y_closing_yield', 'Fi 10y Closing Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_10Y_closing_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_10Y_closing_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
              <div class="form-group {{ $errors->has('FI_10Y_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_10Y_change', 'Fi 10y Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_10Y_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_10Y_change', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_20Y_opening_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_20Y_opening_yield', 'Fi 20y Opening Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_20Y_opening_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_20Y_opening_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_20Y_closing_yield') ? 'has-error' : ''}}">
                {!! Form::label('FI_20Y_closing_yield', 'Fi 20y Closing Yield', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_20Y_closing_yield', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_20Y_closing_yield', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('FI_20Y_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_20Y_change', 'Fi 20y Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_20Y_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_20Y_change', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_90D_opening_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_90D_opening_bid', 'Fi 90d Opening Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_90D_opening_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_90D_opening_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_90D_closing_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_90D_closing_bid', 'Fi 90d Closing Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_90D_closing_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_90D_closing_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_90D_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_90D_change', 'Fi 90d Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_90D_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_90D_change', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_180D_opening_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_180D_opening_bid', 'Fi 180d Opening Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_180D_opening_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_180D_opening_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_180D_closing_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_180D_closing_bid', 'Fi 180d Closing Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_180D_closing_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_180D_closing_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_180D_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_180D_change', 'Fi 180d Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_180D_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_180D_change', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_360D_opening_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_360D_opening_bid', 'Fi 360d Opening Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_360D_opening_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_360D_opening_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_360D_closing_bid') ? 'has-error' : ''}}">
                {!! Form::label('FI_360D_closing_bid', 'Fi 360d Closing Bid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_360D_closing_bid', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_360D_closing_bid', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FI_360D_change') ? 'has-error' : ''}}">
                {!! Form::label('FI_360D_change', 'Fi 360d Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FI_360D_change', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FI_360D_change', '<p class="help-block">:message</p>') !!}
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