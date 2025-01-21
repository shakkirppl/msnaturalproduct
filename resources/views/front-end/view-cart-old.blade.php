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
            <div class="row view-cart-main">
               <div class="col-md-6">
                  <div class="view-cart-product-list">
                     <h1>{{ __('main.Product') }}</h1>
                  </div>
                  @foreach($cartItems as $item)
                  <div class="view-cart-box">
                     <div class="view-cart-close-icon">
                        <!-- Remove item functionality -->
                        <a href="{{ route('cart.remove', ['id' => $item->id]) }}" onclick="return confirm('Are you sure you want to remove this item?')">
                        <i class="fas fa-times"></i>
                        </a>
                     </div>
                     <div class="view-cart-sliding-contents">
                        <div class="view-cart-sliding-head">
                           <h1>{{ __('main.Your_cart') }}</h1>
                        </div>
                        <div class="view-cart-content-box">
                           <div class="view-cart-content-img">
                              <img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
                           </div>
                           <div class="view-cart-content-deatails">
                              <h1>{{ $item->name }}</h1>
                              <p class="view-cart-price-div">{{ $item->attributes->currency }} {{ $item->price }}</p>
                              <div class="view-cart-product-quantity">
                                 <!-- Update quantity functionality -->
                                 <form action="{{ route('cart.update') }}" method="POST" style="display:flex;">
                                    @csrf
                                    <button type="button" class="view-cart-decrement" onclick="updateQuantity('{{ $item->id }}', -1)">−</button>
                                    <input type="text" id="view-cart-quantity-{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" readonly />
                                    <button type="button" class="view-cart-increment" onclick="updateQuantity('{{ $item->id }}', 1)">+</button>
                                 </form>
                              </div>
                              <p>Total: {{ $item->attributes->currency }} {{ $item->quantity * $item->price }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  <div class="row">
                     <div class="col-md-6 p-0">
                     </div>
                     <div class="col-md-6 p-0 " style="text-align:end;">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="view-cart-product-summary">
                     <h1>{{ __('main.Order_Summary') }}</h1>
                     <div class="order-summary-total">
                        <h1><span>{{ __('main.SUB_TOTAL') }} :</span>  {{$currency}} {{Cart::getTotal()}}</h1>
                        <p  class="textarea-para">{{ __('main.cart_description') }}</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="view-cart-continue-shopping">
                        <a href="{{URL::to('/')}}"><button>{{ __('main.CONTINUE_SHOPPING') }}</button></a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="view-cart-update-cart">
                        <a href="{{URL::to('/checkout')}}"><button>{{ __('main.COMPLETE_SHOPPING') }}</button></a>
                     </div>
                  </div>
                  <!-- <div class="col-md-4">
                     <div class="view-cart-proceed-checkout">
                        <a href="{{URL::to('/checkout')}}">
                        <button>
                        {{ __('main.PROCEED_TO_CHECKOUT') }}
                        </button>
                        </a>
                     </div>
                  </div> -->
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
         
         function updateQuantity(itemId, change) {
         const quantityInput = document.getElementById(`view-cart-quantity-${itemId}`);
         let currentQuantity = parseInt(quantityInput.value);
         
         if (currentQuantity + change > 0) {
         const newQuantity = currentQuantity + change;
         
         // Send an AJAX request to update the quantity
         fetch(`{{ route('cart.update') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                id: itemId,
                quantity: newQuantity
            })
         })
         .then(response => response.json())
         .then(data => {
            if (data.success) {
                // Update the quantity input
                quantityInput.value = newQuantity;
                // Optionally, update the total price and other related elements
                location.reload();
            } else {
                alert('Failed to update cart.');
            }
         })
         .catch(error => {
            console.error('Error:', error);
         });
         }
         }
      </script>
   </body>
</html>