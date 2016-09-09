@extends('layouts.admin')

@section('content')
    <div class="col-md-6 col-md-offset-3"  ng-app="admin_app" ng-controller="trace_verify">
        {!! Form::open(['url'=>'entry_shipNo']) !!}
        <div class="form-group">
            <label>Unit_id</label>
            <div class="input-group">
                {!! Form::text('id',null,['class'=>'form-control','ng-model'=>'id']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-click="getName()">Check</button>
                </span>
            </div>


        </div>
        <div class="form-group">
            <label>Received Name</label>
            <div class="input-group">
                {!! Form::text('name',null,['class'=>'form-control','id'=>'name','ng-model'=>'name']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-click="activeSave()">Right?</button>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label>Courier number</label>
            <div class="input-group">
                {!! Form::text('courier_number',null,['class'=>'form-control','placeholder'=>'Entry Tracy Number..','ng-model'=>'track_number','required']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-click="checkParkage()">Check</button>
                </span>
            </div>

        </div>
        <div class="sr-only" id="parkage_found">
            <p class="text-danger">Parkage found!</p>
            Name:<label>@{{parkage_name}}</label><br>
            Service:<label>@{{ service }}</label>
        </div>
        <div class="sr-only" id="space_ca">
            <div class="input-group">
                {!! Form::input('number','space',null,['placeholder'=>'How many cube do you need','class'=>'form-control','ng-model'=>'space_need']) !!}
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="getSpace()">Get</button>
                </span>

            </div>
            <span ng-repeat="x in space">
                <input type="checkbox" value="@{{x.id}}" name="space[]"> @{{ x.tag | uppercase }}&nbsp;&nbsp;
            </span><br>
            <div class="form-group">
                <label class="text-uppercase">big bag</label>
                <div class="input-group">
                <span class="input-group-addon">
                    {!! Form::input('checkbox','big_box',null) !!}
                </span>

                    {!! Form::input('number','big_number',null,['class'=>'form-control']) !!}
                </div>
            </div>

        </div>





        <div class="form-group">

            {!! Form::submit('Submit',['class'=>'btn btn-primary','id'=>'btnSave','disabled']) !!}
        </div>
        {!! Form::close() !!}
    </div>
<script>
    var app = angular.module('admin_app',[]);
    app.controller('trace_verify',function($scope,$http){
        $scope.space_need=1;
        $scope.getName = function(){

            var url = '{{url('getName').'/'}}'+$scope.id;
            $http.get(url)
                    .then(function(response) {

                        $scope.name = response.data;

                    });
        }
        $scope.activeSave = function(){
            if(confirm('Name is '+$scope.name+'?')){
                $('#btnSave').removeAttr('disabled');
            }

        }
        $scope.checkParkage = function(){
            var url = '{{url('getforecast')}}/'+$scope.track_number;

            $http.get(url).then(function(response){
                if(response.data != ''){
                    $scope.parkage_name=response.data.name;
                    $scope.service=response.data.service;
                    $('#parkage_found').removeClass('sr-only');
                }

                $('#space_ca').removeClass('sr-only');
            });
        }
        $scope.getSpace = function(){
            var url = '{{url('getspace')}}/'+$scope.space_need;
//            alert(url);
            $http.get(url).then(function(response){
               if(response.data!=''){
                   $scope.space = response.data;
               }
            });
        }
    });
</script>

@endsection