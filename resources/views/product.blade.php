@extends('layouts.container')
@section('content')


<div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg" data-gall="myGallery">
                                            <img src="  {{$product->image[0]}}" alt="product image">
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{$product->title}}</h2>
                                    <h4>description</h4>
                                    <span class="product-details-ref">{{$product->description}}</span>
                                    <div class="rating-box pt-20">
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">${{$product->price}}</span>
                                    </div>
                                    <div class="single-add-to-cart" style="margin: 10px  ;">
                                        <form action="#" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus" style="display: flex;">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-left"></i></div>
                                                    <input class="cart-plus-minus-box" style="margin: 0 10px ;" value="1" type="text">
                                                    <div class="inc qtybutton" style="cursor: pointer;"><i class="fa fa-angle-right text-bold"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

@endsection