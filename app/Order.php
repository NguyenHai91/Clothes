<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';
	public $timestamps = false;
	public function product()
	{
		return $this->belongTo('App\Product','id','product_id');
	}
	public function transaction()
	{
		return $this->belongTo('App\Transaction','id','transaction_id');
	}
}
