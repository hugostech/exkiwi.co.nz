<div class="panel panel-default">

        <div class="col-md-12 page-header">
            <div class="col-sm-6">
                <div class="btn-group" role="group" aria-label="...">
                    <a href="#warehouse" class="btn btn-default" aria-controls="warehouse" role="tab" data-toggle="tab">In Warehouse</a>
                    <a href="#order" class="btn btn-default" aria-controls="order" role="tab" data-toggle="tab">Order</a>
                    <a href="#finish" class="btn btn-default" aria-controls="finish" role="tab" data-toggle="tab">Finish<span class="badge">{{count($forecast)}}</span></a>
                </div>
                <hr>

            </div>
            <div class="col-sm-6">
                <div class="col-xs-12">
                    <div class="col-xs-3 text-capitalize"><label>Active coupon:</label></div>
                    <div class="col-xs-6"><input type="text" class="form-control" ></div>
                    <div class="col-xs-3"><button type="submit" class="btn btn-primary btn-block">Active</button> </div>
                </div>

                <div class="col-xs-12">

                    <div class="col-xs-3 text-capitalize"></div>
                    <div class="col-xs-6"><button class="btn btn-warning btn-block">Forecast <span class="badge">{{count($forecast)}}</span> </button></div>
                    <div class="col-xs-3"><button type="submit" class="btn btn-primary btn-block" data-toggle="modal"
                                                  data-target="#myModal_forecast_parkage">New</button> </div>
                </div>

            </div>
        </div>


    <div class="panel-body" ng-app="parkage_manage" ng-controller="parkage_edit">



        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="warehouse">
                {!! Form::open(['url'=>'multi-parkage']) !!}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="col-md-1"></th>
                        <th class="col-md-2">Arrived Date</th>
                        <th class="col-md-3">Ship Trace</th>
                        <th class="col-md-1">Weight(KG)</th>
                        <th class="col-md-1">Value</th>
                        <th class="col-md-2">Status</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parkages as $parkage)
                        <tr>

                            <td>
                                @if($parkage->status==2)
                                    {!! Form::input('checkbox','batchSelect[]',$parkage->id) !!}
                                @else
                                    {!! Form::input('checkbox','batchSelect[]',$parkage->id,['disabled']) !!}
                                @endif
                            </td>
                            <td>{{$parkage->created_at}}</td>
                            <td>{{$parkage->track_number}}</td>
                            <td>{{$parkage->weight}}</td>
                            <td>{{isset($parkage->value)?$parkage->value:'unknown'}}</td>
                            <td>{{$status[$parkage->status]}}</td>
                            <td>
                                <a href="{{url('/parkage_edit',[$parkage->id])}}" class="btn btn-warning" >Edit</a>
                                @if($parkage->status==2)
                                    <a href="{{url('/service',[$parkage->id])}}" class="btn btn-primary">Ship</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">{!! Form::submit('Combine selected parkages',['class'=>'btn btn-primary btn-block']) !!}</td>
                    </tr>
                    </tbody>
                </table>
                {!! Form::close() !!}

            </div>
            <div role="tabpanel" class="tab-pane" id="order">order</div>
            <div role="tabpanel" class="tab-pane" id="finish">finish</div>

        </div>


    </div>
    <script>
        var myapp = angular.module('parkage_manage',[]);
        myapp.controller('parkage_edit',function($scope,$http){

        });
    </script>
    {{--<!-- Modal_edit -->--}}
    {{--<div class="modal fade" id="parkage_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
        {{--<div class="modal-dialog" role="document" style="width: 70%">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">Forecast a new parkage</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--{!! Form::open(['url'=>'/parkage_edit']) !!}--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Track No.</label>--}}
                        {{--<input type="text" class="form-control" name="track"required>--}}
                    {{--</div>--}}
                    {{--<table class="table table-bordered">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th class="col-xs-2">Category</th>--}}
                            {{--<th class="col-xs-2">Brand</th>--}}
                            {{--<th class="col-xs-6">Detail</th>--}}
                            {{--<th class="col-xs-1">Value(CNY)</th>--}}
                            {{--<th class="col-xs-1">Action</th>--}}
                        {{--</tr>--}}

                        {{--</thead>--}}
                        {{--<tbody id="parkage_items">--}}
                        {{--<tr class="item hidden tem_item">--}}
                            {{--<td>--}}
                                {{--<select class="form-control" name="category[]">--}}
                                    {{--@foreach($categorys as $category)--}}
                                        {{--<option value="{{$category->id}}">{{$category->description}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="text" class="form-control" name="brand[]" placeholder="brand">--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="text" class="form-control" name="detail[]" placeholder="detail">--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="number" class="form-control" name="value[]" placeholder="value" step="0.01">--}}
                            {{--</td>--}}
                            {{--<td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>--}}
                        {{--</tr>--}}
                        {{--<tr class="item">--}}

                            {{--<td>--}}
                                {{--<select class="form-control" name="category[]">--}}
                                    {{--@foreach($categorys as $category)--}}
                                        {{--<option value="{{$category->id}}">{{$category->description}}</option>--}}
                                    {{--@endforeach--}}


                                {{--</select>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="text" class="form-control" name="brand[]" placeholder="brand">--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="text" class="form-control" name="detail[]"  placeholder="detail" required>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<input type="number" class="form-control" name="value[]" placeholder="value" required step="0.01">--}}
                            {{--</td>--}}
                            {{--<td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--<table>--}}
                        {{--<tr>--}}
                            {{--@foreach($services as $service)--}}
                                {{--<td>{!! Form::input('checkbox','service[]',$service->id) !!} <label>{{$service->content}}</label> </td>--}}
                            {{--@endforeach--}}

                        {{--</tr>--}}
                    {{--</table>--}}

                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- endModal_edit-->--}}

    <!-- Modal -->
    <div class="modal fade" id="myModal_forecast_parkage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Forecast a new parkage</h3>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'/forecast_parkage']) !!}
                    <div class="form-group">
                        <h4>Track Content</h4>
                        <input type="text" class="form-control" name="track"required placeholder="Track No">
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-xs-2">Category</th>
                            <th class="col-xs-2">Brand</th>
                            <th class="col-xs-5">Detail</th>
                            <th class="col-xs-1">Value(CNY)</th>
                            <th class="col-xs-1">Quantity</th>
                            <th class="col-xs-1">Action</th>
                        </tr>

                        </thead>
                        <tbody id="parkage_items">
                        <tr class="item hidden tem_item">
                            <td>

                                {!! Form::select('category[]', $categorys, null, ['placeholder' => 'Pick up category...','class'=>'form-control']) !!}
                            </td>
                            <td>
                                <input type="text" class="form-control" name="brand[]" placeholder="brand">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="detail[]" placeholder="detail">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="value[]" placeholder="value" step="0.01" min="0">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" value="1">
                            </td>
                            <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
                        </tr>
                        <tr class="item">

                            <td>
                                {!! Form::select('category[]', $categorys, null, ['placeholder' => 'Pick up category...','class'=>'form-control']) !!}
                            </td>
                            <td>
                                <input type="text" class="form-control" name="brand[]" placeholder="brand">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="detail[]"  placeholder="detail" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="value[]" placeholder="value" required step="0.01" min="0">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" value="1">
                            </td>
                            <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Add-on Service</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th class="col-sm-3">Content</th>
                            <th class="col-sm-7">Description</th>
                            <th class="col-sm-1">Credit</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>

                            @foreach($services as $service)
                            <tr>

                                <td> <label>{{$service->content}}</label> </td>
                                <td>{{$service->description}} </td>
                                <td> <label>{{$service->credit}}</label> </td>
                                <td>{!! Form::input('checkbox','service[]',$service->id) !!} </td>
                            </tr>
                            @endforeach


                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>