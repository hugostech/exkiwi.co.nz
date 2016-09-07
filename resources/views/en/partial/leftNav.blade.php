<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <label>{{$user->name}}</label><br>
        {{$user->phone}}<br>
        {{$user->email}} <label><small style="color: green">Unactived</small></label><br>
        Credit: <label>{{$user->point}}</label>
        <hr>
        <ul class="list-group">
            <a href="{{url('dashboard')}}" class="list-group-item" id="index">My parkage</a>
            <a href="{{url('address_chn')}}" class="list-group-item" id="chn_add">Chinese Address</a>
            <a href="{{url('address_rec')}}" class="list-group-item" id="own_add">Your address book</a>
            <a href="#" class="list-group-item" id="fin">Finance Detail</a>
            <a href="#" class="list-group-item" id="acc">Account Setting</a>
        </ul>

    </div>
</div>