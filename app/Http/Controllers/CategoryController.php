<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
	
	public function getList()
	{
		$data = Category::all();
		return view('admin.category.list', ['data'=>$data]);
	}
	public function getAdd()
	{
		$parent = Category::all();

		return view('admin.category.add', ['parent'=>$parent]);
	}
	public function postAdd(CategoryRequest $request)
	{
		$gender = Category::select('gender')->where('id','=',$request->slcParent)->get()->first();
		
		$cate = new Category;
		$cate->name = $request->txtCateName;
		// $cate->alias = changeTitle($request->txtCateName);
		$cate->description = $request->txtDesc;
		$cate->parent_id = $request->slcParent;
		$cate->gender = $gender['gender'];
		$cate->active = $request->rdoActive;
		$cate->save();
		return redirect('admin/category/add')->with(['type'=>'success','message'=>'insert success !']);
	}
	public function getDelete($id)
	{
		$parent = Category::where('parent_id','=',$id)->count();
		if ($parent == 0) {
			$cate = Category::find($id);
			$cate->delete();
			return redirect('admin/category/list')->with(['type'=>'success', 'message'=>'delete success !']);
		} else {
			return redirect('admin/category/list')->with(['type'=>'danger', 'message'=>'cannot delete this category !']);
		}
		
	}
	public function getEdit($id)
	{
		$listCate = Category::all();
		$cate = Category::find($id);
		$parent = Category::select('name')->where('id','=',$cate['parent_id'])->get()->first();
		return view('admin.category.edit', ['cate' => $cate, 'listCate'=>$listCate, 'parent' => $parent]);
	}
	public function postEdit($id, Request $request)
	{
		$this->validate($request,[
			'txtCateName' => 'required',
			'slcParent' => 'required',
		],[
			'txtCateName.required' => 'Cate name not empty !',
			'slcParent.required' => 'Cate parent not empty !',
		]);
		$cate = Category::find($id);
		$cate['name'] = $request['txtCateName'];
		$cate['description'] = $request['txtDesc'];
		$cate['active'] = $request['rdoActive'];
		$cate['parent_id'] = $request['slcParent'];
		$gender = Category::find($request['slcParent']);
		$cate['gender'] = $gender['gender'];
		$cate->save();
		return redirect('admin/category/list')->with(['type'=>'success','message'=>'Edit success']);
	}

}
