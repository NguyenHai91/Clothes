<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $fillable = ['id','name','parent_id'];
	public $timestamps = false;

	public function product()
	{
		return $this->hasMany('App\Product');
	}
}
