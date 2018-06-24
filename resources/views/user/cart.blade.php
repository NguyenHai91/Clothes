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
			@include('admin.logs.error')
			<div class="cart-alert alert alert-danger " style="display: none">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Title!</strong> <span class="message"></span>
			</div>
			
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
					@if(count($productInCart) == 0)
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Title!</strong> No product in cart
					</div>
					@else 
					@foreach($productInCart as $item)
					<?php $pr = DB::table('product')->where('id',$item->id)->first() ?>
					<tr>
						<td><a href="cart/delete/{{$item->rowId}}">Delete</a></td>
						<td><a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$pr->image}}"></a></td>
						<td>{{$item->name}}</td>
						<td><input type="text" placeholder="1" class="input-mini txtQuant" value="{{$item->qty}}" data="{{$item->rowId}}"></td>
						<td>${{$item->price}}</td>
						<td class="totalPrice" >${{(float)$item->price * (int)$item->qty}}</td>
					</tr>			  
					@endforeach
					@endif
					
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
		$('input.txtQuant').blur(function (e) {
			
			var id = $(this).attr('data');
			var qty = $(this).val();
			
			var totalPrice = $(this).parent().find('td.totalPrice');
			var cartAlert = $('div.cart-alert');
			var msg = cartAlert.find('span.message');
			$.ajax({
				'type': 'GET',
				'url' : 'cart/update/'+ id +'/'+ qty,
				'cache' : false,
				'data':{'id':id, 'qty':qty},
				success: function(response) {
					cartAlert.css('display','none');
					$('input.txtQuant').css('border','');
					if (response['status'] == 'error') {
						cartAlert.css('display','block');
						msg.text(response['error']);
						$('input.txtQuant').val('1');
						$('input.txtQuant').css('border','1px solid red');
					}
				}
			});

		});
	});
</script>		
@endsection