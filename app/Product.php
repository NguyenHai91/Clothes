<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';
	// protected $fillable = ['name', 'alias', 'price', 'intro', 'content', 'keywords', 'description', 'image', 'user_id', 'category_id'];
	public function category()
	{
		return $this->belongsTo('App\Category','category_id', 'id');
	}
	public function productImages()
	{
		return $this->hasMany('App\ProductImages','product_id','id');
	}
	public function productColor()
	{
		return $this->hasMany('App\ProductColor');
	}
	public function productSize()
	{
		return $this->hasMany('App\ProductSize');
	}
	public function order()
	{
		return $this->hasMany('App\Order');
	}
}
