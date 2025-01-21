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
      <style>
  .your-account-box {
    cursor: pointer;
  }
</style>
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
                  <div class="your-order-head mb-2">
                     <h1>Your Accounts</h1>
                  </div>
               </div>
            </div>
            <div class="your-account-main">
               <div class="row">
                  <div class="col-md-6">
                     <a href="{{URL::to('/your-orders')}}">
                        <div class="your-account-box">
                           <div class="row">
                              <div class="col-md-3 m-auto">
                                 <div class="your-account-sub-img">
                                    <img src="{{URL::to('/')}}/front-end/images/your-account/orders.png" alt="Banner Image"
                                       >
                                 </div>
                              </div>
                              <div class="col-md-9 m-auto">
                                 <div class="your-account-sub-contents">
                                    <h1>Your Orders</h1>
                                    <p>Track, Returns, or buy things Again</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-6">
                     <a href="{{URL::to('/customer-address')}}">
                        <div class="your-account-box">
                           <div class="row">
                              <div class="col-md-3 m-auto">
                                 <div class="your-account-sub-img">
                                    <img src="{{URL::to('/')}}/front-end/images/your-account/address.png" alt="Banner Image"
                                       >
                                 </div>
                              </div>
                              <div class="col-md-9 m-auto">
                                 <div class="your-account-sub-contents">
                                    <h1>Your Addresses</h1>
                                    <p>Edit Addresses For Orders</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-6">
                     <div class="your-account-box" onclick="showPopup()">
                        <div class="row">
                           <div class="col-md-3 m-auto">
                              <div class="your-account-sub-img">
                                 <img style="width:70px;" src="{{URL::to('/')}}/front-end/images/your-account/contact_us._.png" alt="Banner Image"
                                    >
                              </div>
                           </div>
                           <div class="col-md-9 m-auto">
                              <div class="your-account-sub-contents">
                                 <h1>Contact Us</h1>
                                 <p>Contact Our Customer Service</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="popup-box-contact" class="popup-box-contact">
                     <div class="popup-content-contact">
                        <span class="close-btn-contact" onclick="hidePopup()">&times;</span>
                        <h2>{{ __('main.contact') }}</h2>
                        <p>{{ __('main.address') }} </p>
                       <p>{{ __('main.phone_no') }} </p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="your-account-box">
                        <form action="{{ route('sign-out') }}" method="POST" style="display: inline;">
                           @csrf
                           <button type="submit"  style="border: none; background: none; padding: 0; width: 100%; text-align: left;">
                              <div class="row">
                                 <div class="col-md-3 m-auto">
                                    <div class="your-account-sub-img">
                                       <img src="{{URL::to('/')}}/front-end/images/your-account/sign out.png" alt="Banner Image">
                                    </div>
                                 </div>
                                 <div class="col-md-9 m-auto">
                                    <div class="your-account-sub-contents">
                                       <h1>Sign Out</h1>
                                       <p>Sign Out From MS</p>
                                    </div>
                                 </div>
                              </div>
                           </button>
                        </form>
                     </div>
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
      <script>
         function showPopup() {
         const popup = document.getElementById("popup-box-contact");
         popup.style.display = "flex"; // Show the popup
         }
         
         function hidePopup() {
         const popup = document.getElementById("popup-box-contact");
         popup.style.display = "none"; // Hide the popup
         }
         
      </script>
   </body>
</html>