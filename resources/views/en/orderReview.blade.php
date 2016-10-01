@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Order Review</h3>
                   </div>
                   <div class="panel-body">

                       <div class="progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                               4/4
                           </div>
                       </div>
                       <hr>
                       <div class="col-md-9">
                           <div class="panel panel-default">
                               <div class="panel-heading">Ship Address</div>
                               <div class="panel-body">
                                   <address>
                                       <strong>{{$address->name}}</strong><br>
                                       {{$address->street_number}} {{str_limit($address->route,25)}}{{', '.$address->administrative_area_level_1}}<br>
                                       {{$address->locality}}, {{$address->country}} {{$address->postal_code}}<br>
                                       <abbr title="Phone">P:</abbr> {{$address->phone}}
                                   </address>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="panel panel-default">
                               <div class="panel-heading text-center"><button type="button" class="btn btn-success">Place your order</button></div>
                               <div class="panel-body">
                                   <h4>Order Summary</h4>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="panel panel-default">
                               <div class="panel-heading">Detail</div>
                               <div class="panel-body">
                                   <table class="table table-bordered">
                                       <thead>
                                       <tr>
                                           <th>Content</th>
                                           <th>Make</th>
                                           <th>Quantity</th>
                                           <th>Value</th>

                                       </tr>
                                       </thead>
                                       @foreach($contents as $row)
                                           <tr>
                                               <td>{{$row->content}}</td>
                                               <td>{{$row->make}}</td>
                                               <td>{{$row->quantity}}</td>
                                               <td>{{$row->value}}</td>

                                           </tr>

                                       @endforeach
                                       <tr>
                                           <td colspan="3" class="text-right"><label>Total Value</label>(Parkage value over $400 NZ Dollar,
                                               customs may apply. <a href="http://www.whatsmyduty.org.nz/" target="_blank">More Detail</a>)<label>:</label></td>
                                           <td>{{$total}}</td>
                                       </tr>
                                   </table>
                                   <table class="table">
                                       <thead>
                                       <tr>
                                            <th>Service</th>
                                            <th>Quantity</th>
                                            <th>Credit</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       <tr>
                                           <td></td>
                                       </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>


                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection