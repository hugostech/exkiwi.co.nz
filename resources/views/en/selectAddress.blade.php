@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Please select the address you want ship to</h3>
                   </div>
                   <div class="panel-body">
                       <ol class="breadcrumb">
                           <li><a href="{{url('dashboard')}}">Home</a></li>
                           <li><a href="#">Library</a></li>
                           <li class="active">Data</li>
                       </ol>
                       <hr>
                       <div class="progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                               2/4
                           </div>
                       </div>
                       <hr>
                       @foreach($addresses as $address)
                            {!! Form::open(['url'=>'next_carrier']) !!}
                            {!! Form::input('hidden','parkages',$parkage_id) !!}
                            {!! Form::input('hidden','services',$services) !!}
                            {!! Form::input('hidden','address_id',$address->id) !!}

                           <div class="col-sm-3">
                               <div class="thumbnail">
                                   {{--<img src="..." alt="...">--}}
                                   <div class="caption">
                                       <h3>{{$address->locality}}</h3>
                                       <address>
                                           <strong>{{$address->name}}</strong><br>
                                           {{$address->street_number}} {{str_limit($address->route,25)}}{{', '.$address->administrative_area_level_1}}<br>
                                           {{$address->locality}}, {{$address->country}} {{$address->postal_code}}<br>
                                           <abbr title="Phone">P:</abbr> {{$address->phone}}
                                       </address>
                                       <p>
                                           {!! Form::submit('Select',['class'=>'btn btn-primary']) !!} <a href="{{url('address_rec')}}" class="btn btn-default" role="button"> &nbsp;&nbsp;Edit&nbsp;&nbsp; </a></p>
                                   </div>
                               </div>
                           </div>
                           {!! Form::close() !!}

                       @endforeach

                           <div class="col-sm-3">
                               <div class="thumbnail">
                                   <a href="{{url('address_rec')}}" ><img src="{{url('image',['add-address.png'])}}" alt="Add_ad" width="100px"></a>
                                   {{--<div class="caption">--}}

                                   {{--</div>--}}
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