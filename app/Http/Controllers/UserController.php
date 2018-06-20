<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Auth;

class UserController extends Controller
{
	public function getList()
	{
		$users = Users::all();
		return view('admin.user.list',['users'=>$users]);
	}
	public function getAdd()
	{
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $request)
	{
		$user = new User;
		$user['username'] = $request['txtUser'];
		$user['password'] = Hash::make($request['txtPass']);
		$user['email'] = $request['txtEmail'];
		$user['level'] = $request['rdoLevel'];
		$user['remember_token'] = $request['_token'];
		$user->save();
		return redirect('admin/user/add')->with(['type'=>'success','message'=>'add success']);
	}
	public function getDelete($id)
	{
		$current_user = Auth::user()->level;
		$user = User::find($id);
		if ($current_user !== 1 || $id == 1) {
			Return redirect('admin/user/list')->with(['type'=>"danger",'message'=>"Not permission delete user"]);
		} else {
			$user->delete();
			Return redirect('admin/user/list')->with(['type'=>"success",'message'=>"delete user success"]);
		}
		
	}
	public function getEdit($id)
	{
		if ($id == 1) {
			return redirect('admin/user/list')->with(['type'=>'danger', 'message'=>'Cannot edit user, this super user !']);
		} else {
			$user = User::find($id);
			return view('admin.user.edit',['user'=>$user]);
		}
		
	}
	public function postEdit($id, UserRequest $request)
	{
		$user = User::find($id);
		$user['username'] = $request['txtUser'];
		$user['password'] = $request['txtPass'];
		$user['email'] = $request['txtEmail'];
		$user['level'] = $request['rdoLevel'];
		$user->save();
		return redirect('admin/user/list')->with(['type'=>'success', 'message'=>'edit user success']);
	}

}
