<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use App\Category;
use App\Product;
use App\ProductImages;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
use App\Size;
use App\ProductSize;
use App\ProductColor;


class ProductController extends Controller
{
	public function getList()
	{
		$products = Product::all();
		return view('admin.product.list',['products'=>$products]);
	}
	public function getAdd()
	{
		$cate = Category::all();
		$size = Size::all();
		return view('admin.product.add', compact('cate', 'size'));
	}
	public function postAdd(ProductRequest $request)
	{
		$fileName = $request->file('fImages')->getClientOriginalName();
		$product = new Product;
		$cate = Category::find($request['slcCategory']);
		$product['gender'] = $cate['gender'];
		$product['category_id'] = $request['slcCategory'];
		$product['name'] = $request['txtName'];
		$product['price'] = $request['txtPrice'];
		$product['preview'] = $request['txtPreview'];
		$product['description'] = $request['txtDesc'];
		$product['brand'] = $request['txtBrand'];
		$product['active'] = $request['rdoActive'];
		$product['image'] = $fileName;
		
		$request->file('fImages')->move('upload/',$fileName);
		$product->save();
		$id = $product['id'];

		for ($i = 1; $i <= 5; $i++) {
			$img = $request->file('chImage'.$i);
			if (isset($img)) {
				$product_img = new ProductImages;
				$product_img['image'] = $img->getClientOriginalName();
				$product_img['product_id'] = $id;
				$img->move('upload/',$img->getClientOriginalName());
				$product_img->save();
			}
		}
		return redirect('admin/detail/add/'.$product->id)->with(['type'=>'success','message'=>'add product success']);
	}
	public function getDelete($id)
	{
		$productImages = ProductImages::where('product_id','=',$id)->get();
		
		foreach ($productImages as $pi) {
			File::delete('upload/'.$pi['image']);
			$pi->delete();
		}

		$product = Product::find($id);
		File::delete('upload/'.$product['image']);
		$product->delete();
		return redirect('admin/product/list')->with(['type'=>'success','message'=>'delete success']);
	}
	public function getEdit($id)
	{
		$listCate = Category::all();
		$product = Product::find($id);
		return view('admin.product.edit',['product'=>$product,'listCate'=>$listCate]);
	}
	public function postEdit($id, ProductRequest $request)
	{
		$fileName = $request->file('fImages')->getClientOriginalName();
		$product = Product::find($id);
		$cate = Category::find($request['slcCategory']);
		$product['gender'] = $cate['gender'];
		$product['category_id'] = $request['slcCategory'];
		$product['name'] = $request['txtName'];
		$product['price'] = $request['txtPrice'];
		$product['preview'] = $request['txtPreview'];
		$product['description'] = $request['txtDesc'];
		$product['quantity'] = $request['txtQuant'];
		$product['number_order'] = $request['txtNumOrder'];
		$product['brand'] = $request['txtBrand'];
		$product['view'] = $request['txtView'];
		$product['active'] = $request['rdoActive'];
		
		if (isset($fileName)) {
			File::delete('upload/'.$product['image']);
			$request->file('fImages')->move('upload/',$product['image']);
			$product['image'] = $fileName;
		}
		$product->save();
		return redirect('admin/product/list')->with(['type'=>'success','message'=>'Edit success']);
	}
}
