<div class="panel panel-warning">
    <div class="panel-heading">Edit Parkage Info</div>

    <div class="panel-body">


{!! Form::open(['url'=>'/parkage_edit']) !!}
<div class="form-group">
    <label>Track No.</label>
    {!! Form::input('hidden','parkage_id',$parkage->id) !!}
    <input type="text" class="form-control" name="track" value="{{$parkage->track_number}}" readonly>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th class="col-xs-2">Category</th>
        <th class="col-xs-2">Brand</th>
        <th class="col-xs-5">Detail</th>
        <th class="col-xs-1">Value(CNY)</th>
        <th class="col-xs-1">Quantity</th>
        <th class="col-xs-1">Action</th>
    </tr>

    </thead>
    <tbody id="parkage_items">
    <tr class="item hidden tem_item">
        <td>
            {!! Form::select('category[]', $categorys, null, ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}

        </td>
        <td>
            <input type="text" class="form-control" name="brand[]" placeholder="Brand">
        </td>
        <td>
            <input type="text" class="form-control" name="detail[]" placeholder="Detail">
        </td>
        <td>
            <input type="number" class="form-control" name="value[]" placeholder="Value" step="0.01">
        </td>
        <td>
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" value="1">
        </td>
        <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
    </tr>
    @foreach($parkageContent as $item)
    <tr class="item">

        <td>
            {!! Form::select('category[]', $categorys, $item->category_id, ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}

        </td>
        <td>
            <input type="text" class="form-control" name="brand[]" placeholder="brand" value="{{$item->make}}">
        </td>
        <td>
            <input type="text" class="form-control" name="detail[]"  placeholder="detail" required value="{{$item->content}}">
        </td>
        <td>
            <input type="number" class="form-control" name="value[]" placeholder="value" required step="0.01" value="{{$item->value}}">
        </td>
        <td>
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" value="{{$item->quantity}}">
        </td>
        <td><button class="btn btn-danger btn-block" onclick="del_item(this)">Del</button></td>
    </tr>
    @endforeach
    <tr class="item">

        <td>
            {!! Form::select('category[]', $categorys, null, ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}

        </td>
        <td>
            <input type="text" class="form-control" name="brand[]" placeholder="brand">
        </td>
        <td>
            <input type="text" class="form-control" name="detail[]"  placeholder="detail" >
        </td>
        <td>
            <input type="number" class="form-control" name="value[]" placeholder="value" step="0.01">
        </td>
        <td>
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" value="1">
        </td>

        <td><button class="btn btn-primary btn-block" onclick="addone()">Add</button> </td>
    </tr>
    </tbody>
</table>



<div class="form-group">
    {!! Form::submit('Save',['class'=>'btn btn-success btn-block']) !!}

</div>
{!! Form::close() !!}
    </div>
</div>