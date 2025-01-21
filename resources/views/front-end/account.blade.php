<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MS PRODUCT</title>
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
      <!-- header close -->
      <!-- view-cart-section start -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="guest-address-main">
                     <div class="row">
                        <div class="cart-details">
                           <h1>My Cart({{$cartItems->count()}})</h1>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-detail-main-padding">
                        @foreach($cartItems as $item)
                        <div class="row mb-4">
                           <div class="col-md-2 col-3">
                              <div class="cart-detail-img">
                                 <img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
                              </div>
                           </div>
                           <div class="col-md-10 col-9">
                              <div class="cart-product-details">
                                 <div class="cart-head-one">
                                    <h1>{{$item->name}}</h1>
                                 </div>
                                 <div class="cart-head-three">
                                    <h1>{{$item->quantity}} Piece</h1>
                                 </div>
                              </div>
                              <div class="cart-order-product-details-price">
                                 <div class="cart-price-one">
                                    <h1>{{$item->attributes->currency}} {{$item->price}}</h1>
                                 </div>
                                 <div class="cart-price-two">
                                    <h1>{{$item->attributes->currency}} {{$item->attributes->original_price}}</h1>
                                 </div>
                                 <div class="cart-remove-button">
                                    <button class="remove-button">Remove</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach              
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>Sub Total</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
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
                  </div>
                  <div class="sub-buttons">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="cart-actions">
                              <a href="{{url('user-login')}}">
                                 <div class="cart-options-head">
                                    <p class="account-head">Have An Account ?</p>
                                 </div>
                                 <button class="accounts-login">Login</button>
                              </a>
                              <a href="{{url('user-register')}}">
                                 <div class="cart-options-head">
                                    <p class="account-head">New to MS ?</p>
                                 </div>
                                 <button class="new-signup">Sign UP</button>
                              </a>
                              <a href="{{url('guest-checkout')}}">
                                 <div class="cart-options-head">
                                    <p class="account-head">As a guest ?</p>
                                 </div>
                                 <button class="continue-guest">Continue As Guest</button>
                              </a>
                           </div>
                        </div>
                     </div>
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