<div class="block">								
	<h4 class="title"><strong>Best</strong> Seller</h4>								
	<ul class="small-product">
		@foreach($bestSeller as $item)
		<li>
			<a href="product_detail/{{$item->id}}" title="Praesent tempor sem sodales">
				<img src="upload/{{$item['image']}}" alt="Praesent tempor sem sodales">
			</a>
			<a href="product_detail/{{$item->id}}">{{$item['name']}}</a>
		</li>
		@endforeach
	</ul>
</div>