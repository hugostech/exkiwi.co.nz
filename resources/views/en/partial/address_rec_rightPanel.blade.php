<div class="panel panel-default">

        <div class="col-md-12 page-header text-center">
            <h3>Send Address</h3>
        </div>


    <div class="panel-body">



        <div>
            <div id="locationField">
                <input id="autocomplete" placeholder="Enter your address"
                       onFocus="geolocate()" type="text" class="form-control">
            </div>
            {!! Form::open(['url'=>'add_address']) !!}
            <table id="address" class="table">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <tr>
                    <td><label>Street address</label></td>
                    <td class="slimField"><input class="form-control" id="street_number"  name="street_number"
                                                 disabled="true"></td>
                    <td class="wideField" colspan="2"><input class="form-control" id="route" name="route"
                                                             disabled="true" required></td>
                </tr>
                <tr>
                    <td><label>City</label></td>
                    <td class="wideField" colspan="3"><input class="form-control" id="locality" name="locality"
                                                             disabled="true"></td>
                </tr>
                <tr>
                    <td><label>State</label></td>
                    <td class="slimField"><input class="form-control"
                                                 id="administrative_area_level_1" name="administrative_area_level_1" disabled="true"></td>
                    <td><label>Zip code</label></td>
                    <td class="wideField"><input class="form-control" id="postal_code" name="postal_code"
                                                 disabled="true"></td>
                </tr>
                <tr>
                    <td><label>Country</label></td>
                    <td class="wideField" colspan="3"><input class="form-control"
                                                             id="country" name="country" disabled="true"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td><label>Receiver Name</label></td>
                    <td><input type="text" name="name" class="form-control" required></td>
                    <td><label>Phone</label></td>
                    <td><input type="text" name="phone" class="form-control" required></td>
                </tr>
            </table>
            <div class="form-group">
                {!! Form::submit('Add',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>

    <div class="panel-footer">
        <h4>Saved Address</h4>
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="col-sm-2">Name</th>
                <th class="col-sm-3">Address</th>
                <th class="col-sm-2">Phone</th>
                <th class="col-sm-1  text-center">City</th>
                <th class="col-sm-2  text-center">Country</th>
                <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addresses as $key=>$address)
                <tr>
                <td>{{$address->name}}</td>
                <td>{{$address->street_number.' '.$address->route}}</td>
                <td>{{$address->phone}}</td>
                <td class="text-center">{{$address->locality}}</td>
                <td class="text-center">{{$address->country}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{$address->id}}">
                        Edit
                    </button>
                <a href="{{url('del_address',[$address->id])}}" class="btn btn-danger btn-xs">Del</a> </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>



    @foreach($addresses as $address)
            <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="myModal{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Address</h4>
                </div>
                <div class="modal-body">

                    {!! Form::model($address,['url'=>'edit_address/'.$address->id]) !!}
                    {{Form::input('hidden','user_id',null)}}
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                        </div>
                    <div class="form-group">
                        <label>Phone</label>
                        {!! Form::text('phone',null,['class'=>'form-control','required']) !!}
                    </div>
                        <div class="form-group">
                            <label>Street number</label>
                            {!! Form::text('street_number',null,['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Street</label>
                            {!! Form::text('route',null,['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            {!! Form::text('administrative_area_level_1',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Zip code</label>
                            {!! Form::text('postal_code',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            {!! Form::text('country',null,['class'=>'form-control']) !!}
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END Modal -->
    @endforeach




</div>