
<section class="navbar main-menu">
	<div class="navbar-inner main-menu">				
		<a href="index" class="logo pull-left"><img src="user/themes/images/logo.png" class="site_logo" alt=""></a>
		<nav id="menu" class="pull-right">
			<ul>
				<li><a href="products/women">Woman</a>					
					<ul>
						@foreach($cate as $item)
						@if($item['gender'] === 0 && $item['parent_id'] !== 0 )
						<li><a href="products/category/{{$item['id']}}">{{$item['name']}}</a></li>
						@endif	
						@endforeach							
					</ul>
				</li>															
				<li><a href="products/men">Man</a>
					<ul>
						@foreach($cate as $item)
						@if($item['gender']==1 && $item['parent_id'] !== 0)
						<li><a href="products/category/{{$item['id']}}">{{$item['name']}}</a></li>	
						@endif	
						@endforeach							
					</ul>
				</li>			
				<li><a>Sport</a>
					<ul>
						@foreach($sportCates as $item)			
						<li><a href="products/category/{{$item->id}}">{{$item->name}}</a></li>
						@endforeach
					</ul>
				</li>							
				<li><a >Accessory</a>
					<ul>
						@foreach($accessoryCates as $item)			
						<li><a href="products/category/{{$item->id}}">{{$item->name}}</a></li>
						@endforeach
					</ul>
				</li>
				<li><a href="products/bestseller">Best Seller</a>

				</li>

			</ul>
		</nav>
	</div>
</section>
