<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MS NATURAL PRODUCTS</title>
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/main.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/product-detail.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/view-cart.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/guest.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/address.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/account.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/review.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/order-confirmation.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/blog.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" />
   </head>
   <body style="background-color: #FEFDF7;">
      <!-- header start -->
      @include('front-end.include.header')
      <!-- view-cart-section start -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="guest-address-main">
                     <div class="row">
                        <div class="cart-details">
                           <h1 class="cart-title">{{ __('main.Your_cart') }}</h1>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-detail-main-padding">
                        @foreach($cartItems as $item)
                        <div class="row mb-2">
                           <div class="col-md-2 col-3">
                              <div class="cart-detail-img">
                                 <img loading="lazy" src="{{ url('uploads/products/' . $item->attributes->image) }}" class=""
                                    alt="Hair Care Oil Product Image" />
                              </div>
                           </div>
                           <div class="col-md-10 col-9">
                              <div class="cart-product-details">
                                 <div class="cart-head-one">
                                    <h1>{{ $item->name }}</h1>
                                 </div>
                                 <div class="cart-head-two">
                                    <h1>{{ $item->quantity}} Piece</h1>
                                 </div>
                                 <!-- <div class="cart-head-three">
                                    <h1>1 Piece</h1>
                                    </div> -->
                              </div>
                              <div class="cart-order-product-details-price">
                                 <div class="cart-price-one">
                                    <h1>{{ $item->attributes->currency }} {{ $item->price }}</h1>
                                 </div>
                                 <div class="cart-price-two">
                                    <h1>{{$item->attributes->currency}} {{$item->attributes->original_price}}</h1>
                                 </div>
                                 <div class="cart-remove-button">
                                    <a href="{{ route('cart.remove', ['id' => $item->id]) }}" onclick="return confirm('Are you sure you want to remove this item?')" class="remove-button" aria-label="Remove item">Remove</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        <!-- <div class="row mb-2">
                           <div class="col-md-2">
                              <div class="cart-detail-img">
                                 <img src="images/product-detail/Rectangle 131.png" alt="">
                              </div>
                           </div>
                           <div class="col-md-10">
                              <div class="cart-product-details">
                                 <div class="cart-head-one">
                                    <h1>Hair Care Oil</h1>
                                 </div>
                                 <div class="cart-head-two">
                                    <h1>250 ml</h1>
                                 </div>
                                 <div class="cart-head-three">
                                    <h1>1 Piece</h1>
                                 </div>
                              </div>
                              <div class="cart-order-product-details-price">
                                 <div class="cart-price-one">
                                    <h1>₹ 509</h1>
                                 </div>
                                 <div class="cart-price-two">
                                    <h1>₹ 509</h1>
                                 </div>
                                 <div class="cart-remove-button">
                                    <button class="remove-button">Remove</button>
                                 </div>
                              </div>
                           </div>
                           </div> -->
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-4">
                              <div class="cart-details-payment-head">
                                 <h1>{{ __('main.SUB_TOTAL') }} :</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-8">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$originalPrice}}</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>Big Discount</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$originalPrice-$offerPrice}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1 style="font-weight: 600;">Total Payble</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p style="font-weight: 600;">{{$currency}} {{Cart::getTotal()}}</p>
                              </div>
                           </div>
                        </div>
                        <p class="shipping-notice">{{ __('main.cart_description') }}</p>
                     </div>
                     <hr>
                     <div class="cart-actions">
                        <a href="{{URL::to('/')}}">   <button class="continue-shopping">{{ __('main.CONTINUE_SHOPPING') }}</button></a>
                        <a href="{{URL::to('/checkout')}}"><button class="checkout-button">{{ __('main.COMPLETE_SHOPPING') }}</button></a> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- start footer -->
      @include('front-end.include.footar')
      <!--  -->
      <!-- end footer -->
      <script src="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.js"></script>
      <script>
         AOS.init();
      </script>
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/jquery.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   </body>
</html>