@extends('admin.master')
@section('content')


<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.logs.error')
    <form action="admin/detail/add/{{$idProduct}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">

        <div class="form-group">
            <label>id product</label>
            <input class="form-control" name="txtId"  value="{{$idProduct}}" />
        </div>
        <div class="form-group">
            <label>Size</label>
            <select class="form-control" name="slcSize">
                @foreach($size as $item)
                <option value="{{$item['id']}}">{{$item['size']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Color</label>
            <input class="form-control" type="text" name="txtColor" placeholder="Please enter a color name" value="{{old('txtColor')}}" />
            <input class="form-control" type="color" name="slcColor" placeholder="Please choose a color product" value="#ffffff" />
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input class="form-control" name="txtQuant" placeholder="Please enter category keywords" value="{{old('txtQuant')}}" />
        </div>
        
        <button type="submit" class="btn btn-default">Add Detail</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

@endsection()