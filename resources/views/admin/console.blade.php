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
                {!! Form::text('courier_number',null,['class'=>'form-control','placeholder'=>'Entry Tracy Number..']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-default">Check</button>
                </span>
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
    });
</script>

@endsection