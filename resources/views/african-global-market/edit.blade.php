@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h1>Edit African/Global Market Entry</h1>
    
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

    {!! Form::model($africanglobalmarket, [
        'method' => 'PATCH',
        'url' => ['/african-global-market', $africanglobalmarket->id],
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
            <div class="form-group {{ $errors->has('JAISH_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('JAISH_INDEX', 'Jaish Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('JAISH_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('JAISH_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('JAISH_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('JAISH_CHANGE', 'Jaish Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('JAISH_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('JAISH_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('NSE_ASI_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('NSE_ASI_INDEX', 'Nse Asi Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('NSE_ASI_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('NSE_ASI_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('NSE_ASI_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('NSE_ASI_CHANGE', 'Nse Asi Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('NSE_ASI_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('NSE_ASI_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('GGSECI_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('GGSECI_INDEX', 'Ggseci Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('GGSECI_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('GGSECI_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('GGSECI_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('GGSECI_CHANGE', 'Ggseci Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('GGSECI_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('GGSECI_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EGX30_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('EGX30_INDEX', 'Egx30 Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('EGX30_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('EGX30_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EGX30_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('EGX30_CHANGE', 'Egx30 Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('EGX30_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('EGX30_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('SP_500_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('SP_500_INDEX', 'Sp 500 Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('SP_500_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('SP_500_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('SP_500_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('SP_500_CHANGE', 'Sp 500 Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('SP_500_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('SP_500_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('DJIA_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('DJIA_INDEX', 'Djia Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('DJIA_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('DJIA_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('DJIA_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('DJIA_CHANGE', 'Djia Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('DJIA_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('DJIA_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FTSE_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('FTSE_INDEX', 'Ftse Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FTSE_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FTSE_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FTSE_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('FTSE_CHANGE', 'Ftse Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('FTSE_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('FTSE_CHANGE', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('NIKKEL_INDEX') ? 'has-error' : ''}}">
                {!! Form::label('NIKKEL_INDEX', 'Nikkel Index', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('NIKKEL_INDEX', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('NIKKEL_INDEX', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('NIKKEL_CHANGE') ? 'has-error' : ''}}">
                {!! Form::label('NIKKEL_CHANGE', 'Nikkel Change', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('NIKKEL_CHANGE', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    {!! $errors->first('NIKKEL_CHANGE', '<p class="help-block">:message</p>') !!}
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