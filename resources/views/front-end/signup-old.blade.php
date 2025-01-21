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
         <!-- <div class="main-header">
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-md-2 m-auto">
                        <div class="top-first-head">
                           <h1>Splash</h1>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <div class="top-second-head">
                           <h1>www.msnaturalproducts.com Now Changed to www.msnaturalproduct.com</h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bottom-header sticky">
               <div class="row">
                  <nav class="navbar">
                     <div class="col-md-6">
                        <div class="bottom-first-head">
                           <img src="{{URL::to('/')}}/front-end/images/logo.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="bottom-second-head">
                           <div>
                              <button id="toggleOn" class="button btn-on">Arabic</button>
                              <button id="toggleOff" class="button btn-off">English</button>
                           </div>
                           <div>
                              <select id="country" name="country" class="styled-dropdown">
                                 <option value="usa">United States</option>
                                 <option value="canada">Canada</option>
                                 <option value="uk">United Kingdom</option>
                                 <option value="australia">Australia</option>
                                 <option value="india">India</option>
                              </select>
                           </div>
                           <div>
                              <ul class="bottom-list">
                                 <li><img src="{{URL::to('/')}}/front-end/images/header/search.png" alt=""></li>
                                 <li><img src="{{URL::to('/')}}/front-end/images/header/profile.png" alt=""></li>
                                 <li><img src="{{URL::to('/')}}/front-end/images/header/whishlist.png" alt=""></li>
                                 <li><img src="{{URL::to('/')}}/front-end/images/header/cart.png" alt=""> <span
                                    style="color: wheat;">2</span></li>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="sliding-box">
                        <div class="sliding-header">
                           <div class="sliding-box-head">
                              <p>This is a sliding box</p>
                           </div>
                           <div class="close-icon">
                              <i class="far fa-times-circle"></i>
                           </div>
                        </div>
                        <div class="list-menu">
                           <ul>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                           </ul>
                        </div>
                     </div>
                     <div class="cart-sliding-box">
                        <div class="cart-close-icon">
                           <i class="far fa-times-circle"></i>
                        </div>
                        <div class="cart-sliding-contents">
                           <div class="cart-sliding-head">
                              <h1>Your cart</h1>
                           </div>
                           <div class="cart-content-box">
                              <div class="cart-content-img">
                                 <img src="{{URL::to('/')}}/front-end/images/cart/7bfce5e7b22b23472480e71b68444c8a.jfif" alt="">
                              </div>
                              <div class="cart-content-deatails">
                                 <h1>Hair Care Oil</h1>
                                 <p>250ML</p>
                                 <p class="cart-price-div">RS 519.00</p>
                                 <div class="cart-product-quantity">
                                    <button class="cart-decrement" onclick="decrement()">−</button>
                                    <input type="number" id="quantity" value="1" min="1" readonly />
                                    <button class="cart-increment" onclick="increment()">+</button>
                                 </div>
                              </div>
                           </div>
                           <div class="cart-total-payment">
                              <div class="total">
                                 <h6>TOTAL</h6>
                              </div>
                              <div class="total-payment">
                                 <p>RS 1408.00</p>
                              </div>
                           </div>
                           <div class="cart-bottom-para">
                              <p>Shipping, Taxes, and Discounts Will be calculated at the checkout </p>
                           </div>
                           <div class="cart-proceed-checkout">
                              <button>PROCEED TO CHECKOUT</button>
                           </div>
                        </div>
                        <div class="cart-view">
                           <button>
                           View Cart
                           </button>
                        </div>
                     </div>
               </div>
               </nav>
            </div>
            </div> -->
      </section>
      <section>
         <div class="banner">
            <img   src="{{URL::to('/')}}/front-end/images/homebanner/second-banner-img.png"  alt="Banner Image"
               class="product-deatail-img">
         </div>
      </section>
      <section>
         <div class="container">
            <div class="login-form">
               <div class="row">
                  <div class="col-md-12">
                     <div class="login-head">
                        <h1>{{ __('main.Signup') }}</h1>
                        <p>{{ __('main.Login_description') }}</p>
                     </div>
                     <hr class="hr-tag-form">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <form method="POST" action="{{ route('register-user') }}" style="max-width: 400px;">
                        @csrf
                        <!-- Email Field -->
                        <div class="mb-3">
                           <input type="text" class="form-control login-input" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                           <input type="email" class="form-control login-input" id="email" name="email" placeholder="Enter E-Mail id" required>
                        </div>
                        <!-- Password Field -->
                        <div class="mb-3">
                           <input type="password" class="form-control login-input" id="password" name="password" placeholder="password" required>
                        </div>
                        <!-- Retype Password Field -->
                        <div class="mb-3">
                           <input type="password" class="form-control login-input" id="retypePassword" name="retypePassword" placeholder="Retype-password" required>
                        </div>
                        <!-- Phone Number Field -->
                        <div class="mb-3">
                           <input type="tel" class="form-control login-input" id="phone" name="phone" placeholder="Phone Number" required>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="w-100 login-submit">{{ __('main.Submit') }}</button>
                     </form>
                  </div>
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