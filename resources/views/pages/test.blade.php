@extends('layouts.base')

@section('page-content')

		<div ng-app="DashboardApp">   
            <div ng-controller="mainController">
                <a href="#" class="btn btn-success" ng-click="getAllCorporateResults()" >get all corporate reports</a>
                <a href="#" class="btn btn-success" ng-click="registerApiUser()" >register api user</a>
                <a href="#" class="btn btn-success" ng-click="loginApiUser()" >login api user</a>
                <h1>@{{ testValue  }}</h1>
            </div>
            
        </div>

@endsection