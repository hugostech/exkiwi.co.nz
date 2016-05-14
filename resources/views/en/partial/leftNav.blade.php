<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        <label>{{$user->name}}</label><br>
        {{$user->phone}}<br>
        {{$user->email}} <label><small style="color: green">Unactived</small></label><br>
        <hr>
        <ul class="list-group">
            <a href="#" class="list-group-item active">My parkage</a>
            <a href="#" class="list-group-item">Chinese Address</a>
            <a href="#" class="list-group-item">Your address book</a>
            <a href="#" class="list-group-item">Finance Detail</a>
            <a href="#" class="list-group-item">Account Setting</a>
        </ul>
    </div>
</div>