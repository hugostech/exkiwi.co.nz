<div class="panel panel-default">

        <div class="col-md-12 page-header">
            <div class="col-sm-4">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default">Order</button>
                    <button type="button" class="btn btn-default">in Warehouse</button>
                    <button type="button" class="btn btn-default">Finish</button>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="col-xs-12">
                    <div class="col-xs-3 text-capitalize"><label>Active coupon:</label></div>
                    <div class="col-xs-6"><input type="text" class="form-control" ></div>
                    <div class="col-xs-3"><button type="submit" class="btn btn-primary btn-block">Active</button> </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-3 text-capitalize"></div>
                    <div class="col-xs-6"><input type="text" class="form-control" ></div>
                    <div class="col-xs-3"><button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal_forecast_parkage">New</button> </div>
                </div>

            </div>
        </div>


    <div class="panel-body">
        Forecast :{{count($forecast)}}

        <div class="jumbotron">
            <div class="container">
                asdasd
            </div>
        </div>
        <table class="table table-bordered">
            <tr><td>asd</td></tr>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal_forecast_parkage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Forecast a new parkage</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'/forecast_parkage']) !!}
                    <div class="form-group">
                        <label>Track No.</label>
                        <input type="text" class="form-control" name="track"required>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="col-xs-2">Category</th>
                            <th class="col-xs-2">Brand</th>
                            <th class="col-xs-6">Detail</th>
                            <th class="col-xs-1">Value(CNY)</th>
                            <th class="col-xs-1">Action</th>
                        </tr>

                        </thead>
                        <tbody id="parkage_items">
                        <tr class="item hidden tem_item">
                            <td>
                                <select class="form-control" name="category[]">
                                    <option value="1">化妆品</option>
                                    <option value="2">保健品</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="brand[]" placeholder="brand">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="detail[]" placeholder="detail">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="value[]" placeholder="value" step="0.01">
                            </td>
                            <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
                        </tr>
                        <tr class="item">

                            <td>
                                <select class="form-control" name="category[]">
                                    <option value="1">化妆品</option>
                                    <option value="2">保健品</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="brand[]" placeholder="brand">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="detail[]"  placeholder="detail" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="value[]" placeholder="value" required step="0.01">
                            </td>
                            <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
                        </tr>
                        </tbody>
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