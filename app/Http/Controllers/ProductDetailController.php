<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductDetail;
use App\Size;
use App\Color;

class ProductDetailController extends Controller
{
	public function getList()
	{
		$listDetail = ProductDetail::all();
		return view('admin.detail.list',compact('listDetail'));
	}
	public function getAdd($idProduct)
	{
		$size = Size::all();
		return view('admin.detail.add',compact('idProduct','size'));
	}
	public function postAdd(Request $request)
	{
		$this->validate($request,
			[
				'txtId' => 'required',
				'slcSize' => 'required',
				'txtColor' => 'required',
				'slcColor' => 'required',
			],
			[
				'txtId.required' => 'id not empty !',
				'slcSize.required' => 'size not empty !',
				'txtColor.required' => 'name color not empty !',
				'slcColor.required' => 'code color not empty !',
			]);
		$color = new Color;
		$color->name = $request->txtColor;
		$color->code_color = $request->slcColor;
		$color->save();
		$productDetail = new ProductDetail;
		$productDetail->product_id = $request->txtId;
		$productDetail->size_id = $request->slcSize;
		$productDetail->color_id = $color->id;
		$productDetail->quantity = $request->txtQuant;
		$productDetail->save();

		return redirect('admin/detail/add/'.$productDetail->product_id)->with(['type'=>'success', 'message'=>'Add detail success !']);
	}
}
