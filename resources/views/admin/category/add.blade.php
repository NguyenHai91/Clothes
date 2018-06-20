@extends('admin.master')
@section('content')


<div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Title!</strong>
        @foreach($errors->all() as $err)
        {{ $err }}
        @endforeach
    </div>
    @endif

    <form action="admin/category/add" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">
        
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slcParent">
                <option value="">Please Choose Category</option>
                @foreach($parent as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <input class="form-control" name="txtDesc" placeholder="Please Enter Category Order" />
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
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

@endsection()
