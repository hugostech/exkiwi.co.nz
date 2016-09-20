@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Service Add</h3>
                   </div>
                   <div class="panel-body">

                       <div class="progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                               1/4
                           </div>
                       </div>
                       <hr>
                       <H3>Parkages</H3>
                       {!! Form::open(['url'=>'next_ship']) !!}

                       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           @foreach($parkages as $item)
                               <input type="hidden" name="parkage_id[]" value="{{$item['parkage']->id}}">
                           <div class="panel panel-default">
                               <div class="panel-heading" role="tab" id="headingOne">
                                   <h4 class="panel-title">
                                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           {{$item['parkage']->track_number}}<small> Value: {{$item['parkage']->value}}</small>
                                       </a>
                                   </h4>
                               </div>
                               <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                   <div class="panel-body">
                                       <table class="table">
                                           <thead>
                                           <tr>
                                               <th>Content</th>
                                               <th>Make</th>
                                               <th>Value</th>
                                               <th>Quantity</th>
                                           </tr>
                                           </thead>
                                           @foreach($item['parkage_contents'] as $row)
                                               <tr>
                                                   <td>{{$row->content}}</td>
                                                   <td>{{$row->make}}</td>
                                                   <td>{{$row->value}}</td>
                                                   <td>{{$row->quantity}}</td>
                                               </tr>

                                           @endforeach
                                       </table>
                                   </div>
                               </div>
                           </div>
                           @endforeach

                       </div>
                       <h3>Add-On</h3>
                       <div class="jumbotron">

                           <div class="container">
                               <table class="table table-strip">
                                   <tr>
                                       <th class="col-sm-8">Content</th>
                                       <th class="col-sm-2">Value</th>
                                       <th class="col-sm-2"></th>
                                   </tr>
                                    @foreach($services as $service)
                                   <tr>
                                       <td>{{$service->content}}</td>
                                       <td>{{$service->credit}}</td>
                                       <td>{!! Form::checkbox('services[]',$service->id,false) !!}</td>
                                   </tr>
                                    @endforeach
                               </table>

                           </div>

                       </div>
                       {!! Form::submit('Next',['class'=>'btn btn-primary btn-block']) !!}
                       {!! Form::close() !!}







                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection