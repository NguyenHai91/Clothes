@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.logs.error')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token('')}}">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{!! old('txtUser', isset($user) ? $user['username'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" value="{!! old('txtPass', isset($user) ? $user['password'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" value="{!! old('txtRePass', isset($user) ? $user['password'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail', isset($user) ? $user['email'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>User Level</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" {!! $user['level']==1? 'checked' : '' !!} type="radio">Admin
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="0" {!! $user['level']==0? 'checked' : '' !!} type="radio">Member
            </label>
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection
