@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('en.partial.leftNav')
            </div>
            <div class="col-md-9">
                @include('en.partial.edit_parkage')
            </div>
        </div>
    </div>
@endsection