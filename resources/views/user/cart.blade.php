@extends('user.layout.page')	
@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="user/themes/images/pageBanner.png" alt="New products" >
	<h4><span>Shopping Cart</span></h4>
</section>
<section class="main-content">				
	<div class="row">
		<div class="span9">					
			<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($productInCart as $item)
					<?php $pr = DB::table('product')->where('id',$item->id)->first() ?>
					<tr>
						<td><a href="cart/delete/{{$item->rowId}}">Delete</a></td>
						<td><a href="product_detail.html"><img alt="" src="upload/{{$pr->image}}"></a></td>
						<td>{{$item->name}}</td>
						<td><input type="text" placeholder="1" class="input-mini txtQuant" value="{{$item->qty}}" data="{{$item->rowId}}"></td>
						<td>${{$item->price}}</td>
						<td class="totalPrice" >${{(float)$item->price * (int)$item->qty}}</td>
					</tr>			  
					@endforeach
				</tbody>
			</table>
			
			<hr>
			<p class="cart-total right">
				<strong>Sub-Total</strong>:	${{$subtotal}}<br>
				<strong>VAT (21.0%)</strong>: ${{$tax}}<br>
				<strong>Total</strong>: ${{$total}}<br>
			</p>
			<hr/>
			<p class="buttons center">				
				{{-- <a class="btn" type="button" href="cart/update/">Update</a> --}}
				<a class="btn"  href="/">Continue</a>
				<a class="btn btn-inverse" id="checkout" href="checkout">Checkout</a>
			</p>					
		</div>
		<div class="span3 col">
			@include('user.layout.sub_category')
			@include('user.layout.random_block')

		</div>
	</div>
</section>			
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#checkout').click(function (e) {
			document.location.href = "checkout";
		});
		$('input.txtQuant').keyup(function (e) {
			
			var id = $(this).attr('data');
			var qty = $(this).val();
			console.log(qty);
			var totalPrice = $(this).parent().find('td.totalPrice');
			$.ajax({
				'type': 'GET',
				'url' : 'cart/update/'+ id +'/'+ qty,
				'cache' : false,
				'data':{'id':id, 'qty':qty},
				success: function(data) {
					window.location = 'cart';
					console.log(data['sumPrice']);
					
				}
			});

		});
	});
</script>		
@endsection