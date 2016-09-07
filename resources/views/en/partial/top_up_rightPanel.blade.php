<div class="panel panel-default">

        <div class="col-md-12 page-header text-center">
            <h3>Top Up</h3>
        </div>


    <div class="panel-body" ng-app="top_up_app" ng-controller="currency_exchange">

        <div class="col-md-6">
            <button class="btn btn-default btn-block btn-lg" ng-click="currency = 'RMB';amountRecalculate()" id="btn_RMB">
                RMB
            </button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-default btn-block btn-lg" ng-click="currency = 'NZD';amountRecalculate()" id="btn_NZD">
                NZD
            </button>
        </div>

        <div class="col-md-12" >
            <br>
            {!! Form::open(['url'=>'top_up']) !!}

            <div class="form-group">
                {!! Form::label('credit','credit',['class'=>'sr-only']) !!}
                {!! Form::input('number','credit',null,['class'=>'form-control','placeholder'=>'The credit you want to top up','required','ng-model'=>'credit',
                'ng-change'=>'amountRecalculate()']) !!}
            </div>
            <input type="hidden" name="code" value="@{{currency}}">
            <div class="form-group">
                {!! Form::label('amount','Amount') !!}
                <p>@{{ currency }} : <strong>@{{amount}}</strong></p>
            </div>
            <div class="form-group text-center">
                {!! Form::submit('Comfirm',['class'=>'btn btn-primary col-md-6 col-md-offset-3 btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>

    <script>
        var app = angular.module('top_up_app', []);
        app.controller('currency_exchange', function($scope,$http) {
            var rate = 0;
            $scope.amount  = 0;
            $scope.currency = 'RMB';

            $scope.amountRecalculate = function(){
                $scope.amount  = 'Calculating ...';
                var url = '{{url('rate')}}/'+ $scope.currency;

                $http.get(url)
                        .then(function(response) {
                            rate = response.data;
                            $scope.amount = ($scope.credit / rate).toFixed(2);

                        });
                $('btn_'+$scope.currency).addClass('active');

            }


        });


    </script>



</div>