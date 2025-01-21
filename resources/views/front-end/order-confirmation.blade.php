<!DOCTYPE html>
<html lang="en">
   <head>
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
      <!-- header close -->
      <!-- view-cart-section start -->
      <section>
         <div class="product-main-div">
            <div class="order-confirmation-main">
               <div class="row">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="order-confirmation">
                              <div class="image-order">
                                 <img src="{{URL::to('/')}}/front-end/images/order/Ellipse 4.png" alt="Sample Image">
                                 <div class="image-order-sub">
                                    <img src="{{URL::to('/')}}/front-end/images/order/tick.png" alt="Sample Image">
                                 </div>
                              </div>
                              <h1 class="head-first">Thank You For Your Purchase</h1>
                              <p class="head-second">We'have Received Your Order Will Ship In 5-7 Business Days</p>
                              <p class="head-three">Your Order Number Is: <span style="font-weight: 600;"> {{$order->order_no}}</span></p>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end">
                                 <a href="{{url('your-orders')}}"><button class="view-order-confirmation">View Order</button></a>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-start">
                                 <a href="{{url('/')}}"><button class="confirmation-shopping">Continue Shopping</button></a>
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