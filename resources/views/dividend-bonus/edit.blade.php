@extends('layouts.baseAdmin')

@section('page-content')
<div class="containerr">

    <h3>Edit Dividend/Bonus Entry</h1>

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
    
    {!! Form::model($dividendbonus, [
        'method' => 'PATCH',
        'url' => ['/dividend-bonus', $dividendbonus->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <!--div class="form-group {{ $errors->has('ticker_id') ? 'has-error' : ''}}">
                {!! Form::label('ticker_id', 'Ticker Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('ticker_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ticker_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->
            <div class="form-group {{ $errors->has('period') ? 'has-error' : ''}}">
                {!! Form::label('period', 'Period', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('period', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('period', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dividend') ? 'has-error' : ''}}">
                {!! Form::label('dividend', 'Dividend', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('dividend', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dividend', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('bonus') ? 'has-error' : ''}}">
                {!! Form::label('bonus', 'Bonus', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('bonus', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('bonus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('closure_of_register') ? 'has-error' : ''}}">
                {!! Form::label('closure_of_register', 'Closure of register', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('closure_of_register', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('closure_of_register', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agm_date') ? 'has-error' : ''}}">
                {!! Form::label('agm_date', 'AGM Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('agm_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agm_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : ''}}">
                {!! Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('payment_date', '<p class="help-block">:message</p>') !!}
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