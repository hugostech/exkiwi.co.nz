@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Courier Select</h3>
                   </div>
                   <div class="panel-body">

                       <div class="progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                               3/4
                           </div>
                       </div>
                       <hr>
                       <H3>Courier</H3>
                       {!! Form::open(['url'=>'order_review']) !!}
                        {!! Form::input('hidden','address_id',$address_id) !!}
                        {!! Form::input('hidden','parkages',$parkages) !!}
                        {!! Form::input('hidden','services',$services) !!}
                       <div class="row">
                           <div class="col-sm-4 col-md-3">
                               <div class="thumbnail">
                                   <img src="{{url('image',['ems.svg'])}}" alt="ems" width="100%">
                                   <div class="caption">
                                       <h3>EMS</h3>
                                       <p>...</p>
                                       <p class="text-center">
                                           {!! Form::submit('Select',['class'=>'btn btn-info btn-block']) !!}
                                       </p>
                                   </div>
                               </div>
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