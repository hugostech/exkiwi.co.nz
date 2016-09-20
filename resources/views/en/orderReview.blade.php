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
                           <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                               4/4
                           </div>
                       </div>
                       <hr>
                       <div class="col-md12">
                           <div class="panel panel-default col-sm-9">
                               <div class="panel-heading">Panel heading without title</div>
                               <div class="panel-body">
                                   Panel content
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