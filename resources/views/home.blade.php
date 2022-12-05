@extends('./layouts/container')
@section('content')
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">

						<div class="row ">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									@foreach($products as $product)
										<!-- product -->
										<div class="product"  >
											<div class="product-img">
												<img src="{{$product->image[0]}}" class="img-fluid" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">{{$product->categories}}</p>
												<h3 class="product-name"><a href="#">{{$product->title}}</a></h3>
												<h4 class="product-price">$ {{$product->price}} <del class="product-old-price">{{$product->price+1000}}</del></h4>
											</div>
											<div style="display:flex;justify-content:space-around;margin-bottom:10px;">
												<a href="/products/{{$product->id}}" style="color:white;background-color:brown; padding:5px 10px">readmore</a>
												<a href="/addcart/{{$product->id}}" style="color:white;background-color:brown; padding:5px 10px">add to cart</a>
											</div>
										</div>
										@endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


	<script>
		const product = document.querySelector('.product');
		product.addEventListener()
	</script>
@endsection