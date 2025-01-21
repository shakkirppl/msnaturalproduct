<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MS PRODUCT</title>
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/style.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/slider.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/product-detail.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="{{url('favicon.ico')}}" />
   </head>
   <body>
      <section>
         <!-- header -->
         @include('front-end.include.header')
      </section>
      <section>
         <div class="banner">
            <img   src="{{URL::to('/')}}/front-end/images/homebanner/second-banner-img.png"  alt="Banner Image"
               class="product-deatail-img">
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="rate-your-exp">
                     <h1>Account</h1>
                  </div>
               </div>
            </div>
            <div class="account-details">
               <div class="row">
                  <div class="col-md-6 account-first-div">
                     <h1 class="account-div-head-one">To place your order now, log into your existing account or signup</h1>
                     <div class="row">
                        <div class="col-md-4 ">
                           <div class="have-an-account">
                              <h1>Have An Account ?</h1>
                              <a href="{{url('user-login')}}"><button class="account-login">Login</button></a>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="new-to-ms">
                              <h1>New to MS ?</h1>
                              <a href="{{url('user-register')}}"><button class="account-sigup">Sign uP </button></a>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="as-guest">
                              <h1>As a Guest ?</h1>
                              <a href="{{url('guest-checkout')}}"><button class="account-guest">Continue as Guest </button></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @if(count($cartItems) > 0)
                  <div class="col-md-3 account-bag-main">
                     <div class="bag">
                        <h1>BAG</h1>
                        @foreach($cartItems as $item)
                        <div class="row">
                           <div class="col-md-4 p-0">
                              <div class="account-bag-img"><img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="account-bag-details">
                                 <h1>{{$item->name}}</h1>
                                 <div class="account-bag-price">
                                    <p>{{$item->attributes->currency}} {{$item->price}}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr style="border: 1px solid rgba(255, 255, 255, 0.5)">
                        <div class="row">
                           <div class="col-md-6 p-0">
                              <div class="account-quantity-main">
                                 <h1>Quantity :</h1>
                                 <h1>{{$item->quantity}}</h1>
                              </div>
                           </div>
                           <div class="col-md-6 p-0">
                              <div class="quantity-price">
                                 <h1>
                                    {{$item->attributes->currency}} {{$item->quantity*$item->price}}
                                 </h1>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-md-3 account-bag-main-price">
                     <div class="quantity-price-details">
                        <div class="account-price-details">
                           <p>{{ __('main.cart_description') }}</p>
                        </div>
                        <div class="row">
                           <div class="col-md-6 p-0">
                              <div class="account-you-pay ">
                                 <h1>You Pay </h1>
                              </div>
                           </div>
                           <div class="col-md-6 p-0">
                              <div class="account-pay-amount ">
                                 <h1>
                                    {{$currency}} {{Cart::getTotal()}}
                                 </h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </section>
      <!-- footar -->
      @include('front-end.include.footar')
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/sliderscroll.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script>
         $('#instagram-slider').owlCarousel({
             loop: true,
             margin: 10,
             nav: true,
             dots: false,
             navText: [
                 "<img src='images/Instagram/left Rounded Arrow.png' alt='Previous'>",
                 "<img src='images/Instagram/right Rounded Arrow.png' alt='Next'>"
             ],
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 3
                 },
                 1000: {
                     items: 5
                 }
             }
         })
         
         
         $('#youtube-slider').owlCarousel({
             loop: true,
             margin: 10,
             nav: true,
             dots: false,
             navText: [
                 "<img src='images/Instagram/left Rounded Arrow.png' alt='Previous'>",
                 "<img src='images/Instagram/right Rounded Arrow.png' alt='Next'>"
             ],
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 1
                 },
                 1000: {
                     items: 5
                 }
             }
         })
         
         
         $('#testimonial-slider').owlCarousel({
             loop: true,
             margin: 10,
             nav: true,
             dots: false,
             navText: [
                 "<img src='images/What People Say/what people say right arrow.png'>",
                 "<img src='images/What People Say/what people say left arrow.png'>"
             ],
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 1
                 },
                 1000: {
                     items: 1
                 }
             }
         })
      </script>
      <script>
         $(document).ready(function () {
             var $bottomHeader = $('.bottom-header');
             var offsetTop = $bottomHeader.offset().top;
             $bottomHeader.removeClass('sticky');
             var lastScrollTop = 0;
         
             $(window).scroll(function () {
                 var scrollTop = $(this).scrollTop();
         
                 if (scrollTop > offsetTop) {
                     $bottomHeader.addClass('sticky');
                     if (scrollTop > lastScrollTop) {
                         $bottomHeader.css('top', '0px');
                     } else {
                         $bottomHeader.css('top', '0');
                     }
                 } else {
                     $bottomHeader.removeClass('sticky');
                     $bottomHeader.css('top', '');
                 }
         
                 lastScrollTop = scrollTop;
             });
         });
         const toggleOn = document.getElementById('toggleOn');
         const toggleOff = document.getElementById('toggleOff');
         let isOn = true;
         
         function toggle() {
         
             isOn = !isOn;
         
             if (isOn) {
                 toggleOn.style.display = 'inline-block';
                 toggleOff.style.display = 'none';
             } else {
                 toggleOn.style.display = 'none';
                 toggleOff.style.display = 'inline-block';
             }
         }
         toggleOff.style.display = 'none';
         toggleOn.addEventListener('click', toggle);
         toggleOff.addEventListener('click', toggle);
      </script>
      <script>
         $(document).ready(function () {
             $('.toggle-box').click(function () {
                 $('.sliding-box').toggleClass('active');
             });
         
             $('.close-icon').click(function () {
                 $('.sliding-box').removeClass('active');
             });
         });
      </script>
      <script>
         $(document).ready(function () {
             $('.cart-box').click(function () {
                 $('.cart-sliding-box').toggleClass('active');
             });
         
             $('.cart-close-icon').click(function () {
                 $('.cart-sliding-box').removeClass('active');
             });
         });
      </script>
      <script>
         function increment() {
             const quantityInput = document.getElementById('quantity');
             quantityInput.value = parseInt(quantityInput.value) + 1;
         }
         
         function decrement() {
             const quantityInput = document.getElementById('quantity');
             if (quantityInput.value > 1) {
                 quantityInput.value = parseInt(quantityInput.value) - 1;
             }
         }
         
      </script>
      <script>
         function increment() {
             const quantityInput = document.getElementById('view-cart-quantity');
             quantityInput.value = parseInt(quantityInput.value) + 1;
         }
         
         function decrement() {
             const quantityInput = document.getElementById('view-cart-quantity');
             if (quantityInput.value > 1) {
                 quantityInput.value = parseInt(quantityInput.value) - 1;
             }
         }
         
      </script>
      <script>
         // Activate thumbnail on click
         document.querySelectorAll('#thumbCarousel .thumb').forEach((thumb, index) => {
             thumb.addEventListener('click', function () {
                 document.querySelectorAll('#thumbCarousel .thumb').forEach(t => t.classList.remove('active'));
                 this.classList.add('active');
             });
         });
         
         // Sync thumbnail with carousel slide change
         document.getElementById('myCarousel').addEventListener('slide.bs.carousel', function (event) {
             const index = event.to;
             document.querySelectorAll('#thumbCarousel .thumb').forEach(t => t.classList.remove('active'));
             document.querySelector(`#thumbCarousel .thumb[data-bs-slide-to="${index}"]`).classList.add('active');
         });
      </script>
   </body>
</html>