<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Size;

class SizeController extends Controller
{
	function getList()
	{
		$listSize = Size::all();
		return view('admin.size.list', compact('listSize'));
	}
	public function getAdd()
	{
		return view('admin.size.add');
	}
	public function postAdd(Request $request)
	{
		$this->validate($request,
			[
				'txtSize' => 'required|unique:size,size',
			],
			[
				'txtSize.required' => 'Size is not empty !',
				'txtSize.unique' => 'Size is exist !',
			]);
		$size = new Size;
		$size->size = $request->txtSize;
		$size->save();
		return redirect('admin/size/add');
	}
}
