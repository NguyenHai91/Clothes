@extends('admin.master')
@section('content')


<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.logs.error')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="slcCategory">
                <option value="0">Please Choose Category</option>
                @foreach($listCate as $item)
                <option value="{{$item['id']}}" {{$product->category->name == $item['name'] ? 'selected' : ''}} >{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName'),isset($product) ? $product['name'] : null !!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice'),isset($product) ? $product['price'] : null !!}" />
        </div>
        <div class="form-group">
            <label>Preview</label>
            <input class="form-control" name="txtPreview" placeholder="Please Enter Password" value="{!! old('txtPreview'),isset($product) ? $product['preview'] : null !!}" />
        </div>
        <div class="form-group">
            <label>Brand</label>
            <input class="form-control" name="txtBrand" placeholder="Please Enter Password" value="{!! old('txtBrand'),isset($product) ? $product['brand'] : null !!}" />
        </div>

        <div class="form-group">
            <label>Number Order</label>
            <input class="form-control" name="txtNumOrder" placeholder="Please Enter Password" value="{!! old('txtNumOrder'),isset($product) ? $product['number_order'] : null !!}" />
        </div>
        <div class="form-group">
            <label>View</label>
            <input class="form-control" name="txtView" placeholder="Please Enter Password" value="{!! old('txtView'),isset($product) ? $product['view'] : null !!}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDesc">{!! old('txtDesc'),isset($product) ? $product['description'] : null !!}</textarea>
        </div>
        <div class="form-group">
            <label>Active</label>
            <label class="radio-inline">
                <input name="rdoActive" value="1" checked="" type="radio">True
            </label>
            <label class="radio-inline">
                <input name="rdoActive" value="0" type="radio">False
            </label>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

<!-- /#page-wrapper -->
@endsection()