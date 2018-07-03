@extends('admin.master')
@section('content')


<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.logs.error')
    <form action="admin/product/add" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="slcCategory">
                <option value="0">Please Choose Category</option>
                @foreach($cate as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please enter name product" value="{{old('txtName')}}" />
        </div>
        
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please enter price"  value="{{old('txtPrice')}}"/>
        </div>
        <div class="form-group">
            <label>Preview</label>
            <input class="form-control" rows="3" name="txtPreview" value="{{old('txtPreview')}}" placeholder="Please enter preview product">
        </div>
        <div class="form-group">
            <label>Product Brand</label>
            <input class="form-control" name="txtBrand" placeholder="Please enter category keywords" value="{{old('txtBrand')}}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDesc" value="{{old('txtDesc')}}"></textarea>
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
            <label>Images main</label>
            <input type="file" name="fImages">
        </div>
        <div class="row">
            @for($i = 1; $i <= 5; $i++)
            <div class="col-lg-6">
                <div class="form-group">
                    <label>List Childs Images</label>
                    <input type="file" name="chImage{{$i}}">
                </div>
            </div>
            @endfor
        </div>
        
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

@endsection()