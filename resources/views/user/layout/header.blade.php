
<section class="navbar main-menu">
	<div class="navbar-inner main-menu">				
		<a href="index" class="logo pull-left"><img src="user/themes/images/logo.png" class="site_logo" alt=""></a>
		<nav id="menu" class="pull-right">
			<ul>
				<li><a href="category/2">Woman</a>					
					<ul>
						@foreach($cate as $item)
						@if($item['gender'] === 0 && $item['parent_id'] !== 0 )
						<li><a href="category/{{$item['id']}}">{{$item['name']}}</a></li>
						@endif	
						@endforeach							
					</ul>
				</li>															
				<li><a href="category/1">Man</a>
					<ul>
						@foreach($cate as $item)
						@if($item['gender']==1 && $item['parent_id'] !== 0)
						<li><a href="category/{{$item['id']}}">{{$item['name']}}</a></li>	
						@endif	
						@endforeach							
					</ul>
				</li>			
				<li><a href="">Sport</a>
					<ul>									
						<li><a href="">Gifts and Tech</a></li>

					</ul>
				</li>							
				<li><a href="">Accessory</a></li>
				<li><a href="">Best Seller</a></li>

			</ul>
		</nav>
	</div>
</section>
