@extends('user.layout.page')

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="user/themes/images/pageBanner.png" alt="New products" >
	<h4><span>New products</span></h4>
</section>
<section class="main-content">

	<div class="row">						
		<div class="span9">								
			<ul class="thumbnails listing-products">

				@foreach($product as $item)

				<li class="span3">
					<div class="product-box">
						<span class="sale_tag"></span>												
						<a href="product_detail/{{$item['id']}}"><img alt="" src="upload/{{$item['image']}}"></a><br/>
						<a href="product_detail/{$item['id']}" class="title">{{$item['name']}}</a><br/>
						<a href="#" class="category">Phasellus consequat</a>
						<p class="price">${{$item['price']}}</p>
					</div>
				</li>       
				@endforeach
			</ul>								
			<hr>
			<div class="pagination pagination-small pagination-centered">
				{{$product->links()}}
				{{-- <ul>
								<li><a href="#">Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul> --}}
						</div>
					</div>
					<div class="span3 col">
						@include('user.layout.sub_category')
						@include('user.layout.random_block')
						@include('user.layout.bestseller_block')
						
						
					</div>
				</div>

			</section>
			@endsection
