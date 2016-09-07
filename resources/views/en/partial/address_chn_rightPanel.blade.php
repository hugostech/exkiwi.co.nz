<div class="panel panel-default">

        <div class="col-md-12 page-header text-center">
            <h3>Chinese Address</h3>
        </div>


    <div class="panel-body" ng-app="top_up_app" ng-controller="currency_exchange">



        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">南京市</a></li>

                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">More storage</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">




                    <div class=col-md-6>
                          <div class="form-group">

                              <label>Name</label>
                              <input type="text" name="name" value="快鸟中国 Unit_{{$user->id}}" class="form-control">
                          </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="苜蓿园东街1号 Unit{{$user->id}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label>Sur</label>
                            <input type="text" name="sur" value="秦淮区" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" value="南京" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PostCode</label>
                            <input type="text" name="post" value="210000" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" name="telephone" value="+64-09-8428943" class="form-control">
                        </div>
                    </div>



                </div>

                <div role="tabpanel" class="tab-pane" id="settings">comming soon</div>
            </div>

        </div>

    </div>




</div>