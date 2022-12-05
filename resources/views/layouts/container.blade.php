<!DOCTYPE html>
<html lang="en">
	<head>

	<!-- Dasboar css -->
	





	<!-- end -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>ElectronicsShop</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/style.css')}}"/>

		<style>
			.allProducts{
				background-color:blue ;
				display: grid;
				grid-template-columns: 800px;
			}
		</style>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +250780514840</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> electronicsshop@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Kigali Rw</a></li>
					</ul>
					<ul class="header-links pull-right">
						
						@if(!auth()->user())
						
						<li><button data-toggle="modal" data-target="#exampleModalSignup"class="button" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'"><i class="fa fa-user-o" ></i>Signup</button></li>
						<li><button data-toggle="modal" data-target="#exampleModal"class="button" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'"><i class=" fa fa-sign-in" ></i>Login</button></li>
						<li><button data-toggle="modal" data-target="#exampleModalSupplier"class="button" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'"><i class=" fa fa-sign-in" ></i>Become Supplier</button></li>
					@else
					<span class="button"><i class=" fa fa-user" style="color: red;"></i> {{auth()->user()->email}} </span>
					<li><a href="/logout" class="button" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'"><i class=" fa fa-sign-out" ></i>Logout</a></li>
						@endif
					</ul>
				</div>
			</div>
<!-- Modal  Login-->
<form name="login-form" id="login-form" action="/login" method="post">
	{{csrf_field()}}
	<div class="modal fade login" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">LogIn</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body form-group">
		<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		@error('email')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		@error('password')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
			<button type="submit" class="btn btn-danger">Login</button>
		</div>
		</div>
	</div>
	</div>
</form>


<!-- Modal Signup -->
<form  class="row g-3 needs-validation" novalidate name="register-form" id="register-form"action="/register" method="post">
	{{csrf_field()}}
	<div class="modal fade login" id="exampleModalSignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Signup</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body form-group">
		<input type="name" class="form-control" name="name" id="exampleInputName"placeholder="Enter Name">
		@error('name')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror	
		<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		@error('email')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
			<input type="text" style="display: none;" class="form-control" placeholder="Enter Role_id" value="4" name="role_id">
		@error('email')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
		@error('password')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		<input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Confirm Password"> 
		@error('password_confirmation')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror     
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
			<button type="submit" class="btn btn-danger" [disabled]="!ngForm.valid" onclick="location.href='/'">Register</button>
		</div>
		</div>
	</div>
	</div>
</form>

<!-- Modal Become Supplier -->
<form  class="row g-3 needs-validation" novalidate name="register-form" id="register-form"action="/supplier/create" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="modal fade login" id="exampleModalSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Apply to become a supplier</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body form-group">
		<input type="name" class="form-control" name="name" id="exampleInputName"placeholder="Enter Name">
		<input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="phone">
		<input type="text" class="form-control" name="descripton" id="exampleInputPassword1" placeholder="descrition"> 
		<input type="text" class="form-control" name="id_number" id="exampleInputPassword1" placeholder="ID number"> 
		<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		@error('email')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
			<input type="text" style="display: none;" class="form-control" value="4" name="role_id">
		@error('email')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
		@error('password')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror
		<input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="phone"> 
		@error('phone')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror 
			<input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="descrition"> 
		@error('description')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror 
			<input type="text" class="form-control" name="id_number" id="exampleInputPassword1" placeholder="ID number"> 
		@error('id_number')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror 
			<input type="file" class="form-control" name="id_image" id="exampleInputPassword1" placeholder="ID photo"> 
		@error('id_image')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror 
			<input type="file" class="form-control" name="profile_image" id="exampleInputPassword1" placeholder="Profile Photo"> 
		@error('profile_image')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror    
			<input type="text" class="form-control" name="payment_card" id="exampleInputPassword1" placeholder="Payment Card"> 
		@error('payment_card')
			<b><span class="text-danger">{{$message}}</span></b>
			@enderror   
	</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
			<button type="submit" class="btn btn-danger" [disabled]="!ngForm.valid">Apply</button>
		</div>
		</div>
	</div>
	</div>
</form>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<img src="{{URL::asset('./img/logo.png')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ Session::get('cart') ? count(Session::get('cart')) : 0 }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											
       								  <?php $total = 0;  $count=0?>
										@if(session('cart'))
											@foreach(session('cart') as $id => $details)
											<?php $total += $details['price'] * $details['quantity'];$count++ ?>
											<div class="product-widget">

												<div class="product-img">
													<img src="{{ $details['photo'][0] }}"  alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{ $details['name'] }}</a></h3>
													<h4 class="product-price"><span class="qty">{{ $details['quantity'] }}x</span>${{ $details['price'] }}</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
											@endforeach
											@endif
										</div>		
										<div class="cart-summary">
											<small>{{$count}} Item(s) selected</small>
											<h5>SUBTOTAL: $ {{$total}}</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="/stripe">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
@yield('content')

<!-- FOOTER -->
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row container">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Your satsfaction is our Motive.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>KN 15 ave</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+250 787938344</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>electronicshop@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								 <a target="_blank" href="#">Sosten & Abdoulkalim</a>
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{URL::asset('js/jquery.min.js')}}"></script>
		<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
		<script src="{{URL::asset('js/slick.min.js')}}"></script>
		<script src="{{URL::asset('js/nouislider.min.js')}}"></script>
		<script src="{{URL::asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{URL::asset('js/main.js')}}"></script>
		<script src="../../js/supplier.js"></script>
		<script>
			const supplierForm = document.querySelector('.supplier-form');
			supplierForm.addEventListener('submit',(e) =>{
				e.preventDefault();
				let name = supplierForm.name.value;
				let phone = supplierForm.phone.value;
				let email = supplierForm.email.value;
				let descripton = supplierForm.descripton.value;
				let id = supplierForm.id_number.value;
				let imgprofile = supplierForm.profile_image.value
				let idImg = supplierForm.id_image.value;
				let payment = supplierForm.payment_card.value;
				let password = supplierForm.password.value;
				let role_id = 3;

				console.log(role_id,password,payment,imgprofile,idImg,id,descripton,email,phone,name)

				const formData = new FormData();
				formData.append('name',name);
				formData.append('email',email);
				formData.append('password',password);
				formData.append('phone',phone);
				formData.append('description',descripton);
				formData.append('id_number',id);
				formData.append('id_image',idImg);
				formData.append('profile_image',imgprofile);
				formData.append('payment_card',payment);

				fetch('/supplier/create',{
					method:'POST',
					headers:{'Content-Type': 'application/json','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					body:JSON.stringify(formData),
				}).then(res => console.log(res)).catch(error => console.log(error))

			})
		</script>

	</body>
</html>
