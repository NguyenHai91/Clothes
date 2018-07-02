@extends('admin.master')
@section('content')


<div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Title!</strong>
        @foreach($errors->all() as $err)
        {{$err}}
        @endforeach
    </div>
    @endif

    <form action="admin/size/add" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">
        <div class="form-group">
            <label>Size Name</label>
            <input class="form-control" name="txtSize" placeholder="Please Enter Size Name" />
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

@endsection()
