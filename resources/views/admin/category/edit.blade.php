@extends('admin.master')
@section('content')


<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.logs.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slcParent">
                <option value="">Please Choose Category</option>
                @foreach($listCate as $item)
                @if($item['name'] !== $cate['name'])
                <option value="{{$item['id']}}" {{
                    $parent['name'] == $item['name'] ? 'selected' : ''  
                }}>{{$item['name']}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$cate['name']}}" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <input class="form-control" name="txtDesc" placeholder="Please Enter Category Order" value="{{$cate['description']}}" />
        </div>
        <div class="form-group">
            <label>Active</label>
            <label class="radio-inline">
                <input name="rdoActive" value="1" {{$cate['active']==1 ? 'checked' : ''}} type="radio">True
            </label>
            <label class="radio-inline">
                <input name="rdoActive" value="0" {{$cate['active']==0 ? 'checked' : ''}} type="radio">False
            </label>
        </div>

        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>


@endsection()