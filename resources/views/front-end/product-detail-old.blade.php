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
         @include('front-end.include.header')
      </section>
      <section>
         <div class="banner">
            <img   src="{{URL::to('/')}}/front-end/images/homebanner/second-banner-img.png"  alt="Banner Image"
               class="product-deatail-img">
         </div>
      </section>
      <section>
         <div class="container product-detail-main">
            <div class="row">
            <div class="col-md-6">
   <div id="myCarousel" class="carousel slide" data-bs-interval="false">
      <div class="carousel-inner">
         @foreach($productImages as $key => $proimage)
         <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
            <img src="{{ url('uploads/products/' . $proimage->image) }}" class="d-block w-100" alt="IMG {{ $key + 1 }}">
         </div>
         @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>

   <div id="thumbCarousel" class="d-flex justify-content-center mt-3">
      @foreach($productImages as $key => $proimage)
      <div data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" class="thumb {{ $key === 0 ? 'active' : '' }}">
         <img src="{{ url('uploads/products/' . $proimage->image) }}" class="img-thumbnail" alt="Thumbnail {{ $key + 1 }}">
      </div>
      @endforeach
   </div>
</div>

               <div class="col-md-6">
                  <div class="product-detail-head">
                     <h1>{{ $product->name }}</h1>
                     @if($selectedProductPrice->original_price != $selectedProductPrice->offer_price)
                     <p class="price-display-original" id="price-display-original">
                        <span style="text-decoration: line-through;">
                        {{$currency}} {{$selectedProductPrice->original_price}}
                        </span>
                     </p>
                     @endif
                     <p class="price-display price-display-detail" id="price-display">{{ $currency }} {{ $selectedProductPrice->offer_price ?? 'N/A' }}</p>
                  </div>
                  <div class="price-details">
                     @if(count($units) > 1)
                     <div class="row">
                        <div class="col-md-3">
                           <div class="capacity-list">
                              <h1>{{ __('main.Capacity') }}</h1>
                           </div>
                        </div>
                        <div class="col-md-9">
                           <div class="product-detail-list">
                              <div class="product-list-button">
                                 <ul>
                                    @foreach($units as $index => $unit)
                                    <li>
                                       <a class="add-cart-btn price"  style="cursor:pointer;"
                                          data-product-size-id="{{ $unit->id }}" 
                                          data-store-id="{{ $storeId }}">
                                       {{ $unit->size }}
                                       </a>
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                     <div class="row">
                        <div class="col-md-3">
                           <div class="capacity-list">
                              <h1>{{ __('main.Quantity') }}</h1>
                           </div>
                        </div>
                        <div class="col-md-9">
                           <div class="product-detail-list">
                              <div class="product-list-quantity">
                                 <div class="product-detail-product-quantity">
                                    <button class="product-detail-decrement" onclick="decrement()">−</button>
                                    <input type="text" id="quantity-product-deatil" class="cartquantity" name="cartquantity" value="1" min="1" readonly />
                                    <button class="product-detail-increment" onclick="increment()">+</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="product-details-price">
                        <!-- <p>RS 519.00</p> -->
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="buy-it-now">
                              <button class="buy-now-btn-detail" id="buy-now-btn" data-product-size-id="{{ $selectedProductPrice->product_size_id }}" data-store-id="{{ $storeId }}">{{ __('main.BUY_NOW') }}</button>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="add-to-cart">
                              <button class="add-now-btn" id="add-now-btn" data-product-size-id="{{ $selectedProductPrice->product_size_id }}" data-store-id="{{ $storeId }}">{{ __('main.ADD_TO_CART') }}</button>
                           </div>
                        </div>
                        <div id="popupBox-cart" class="popup-cart">
                           <div class="popup-content-cart">
                              <span id="closeBtn-cart" class="close-cart">&times;</span>
                              <h2>Item Added to Cart!</h2>
                              <p>Your item has been added to the cart successfully.</p>
                              <a href="{{url('view-cart')}}"><button  class="view-cart-popup-box" id="viewCartBtn">View Cart</button></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <section class="review-main">
         <!-- <img src="{{URL::to('/')}}/front-end/images/product-detail-page/product-detail-review.png" alt=""> -->
         <div class="desc-review-main">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="description-review">
                        <!-- Tabs navigation -->
                        <div class="description-review-tab">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab" aria-controls="desc" aria-selected="true">{{ __('main.Description') }}</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">{{ __('main.Reviews') }}</button>
                              </li>
                           </ul>
                        </div>
                        <!-- Tabs content -->
                        <div class="description-review-contents">
                           <div class="tab-content" id="myTabContent">
                              <div class="tab-pane show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <p>{{$product->description}}</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane " id="review" role="tabpanel" aria-labelledby="review-tab">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-md-12">
                                          @foreach($review as $revie)
                                          <div class="review-main">
                                             <div class="review-card">
                                                <div class="review-header">
                                                   <div class="user-info">
                                                      <h3 class="user-name"> @foreach($revie->user as $use)
                                                         {{$use->name}}
                                                         @endforeach
                                                      </h3>
                                                      <span class="review-date"> {{$revie->in_date}}</span>
                                                   </div>
                                                   <div class="star-rating-review">
                                                      @for ($i = 1; $i <= 5; $i++)
                                                      @if ($i <= $revie->start_ratings)
                                                      <i class="fa fa-star text-warning"></i> 
                                                      @else
                                                      <i class="fa fa-star-o text-warning"></i>
                                                      @endif
                                                      @endfor
                                                   </div>
                                                </div>
                                                <div class="review-comment">
                                                   <p>
                                                      {{$revie->review}} 
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                          @endforeach
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               @foreach($reProducts as $products)
               <div class="col-md-4">
                  <div class="product-box">
                     <a href="{{url('product-view/hair-care-oil')}}">
                        <div class="product-box-img">
                           <img src="{{ url('uploads/products/' . $products['image']) }}" alt="">
                        </div>
                     </a>
                     <div class="product-box-banner-img">
                        <img src="{{URL::to('/')}}/front-end/images/ourproduct/our-product-below-banner.png" alt="">
                      
                        <div class="product-box-details-content-bottom">
                        <a href="{{url('product-view/hair-care-oil')}}">
                           <div class="product-box-contents-details ">
                              <h1 class="related-product">{{$products['name']}}</h1>
                           </div>
                        </a>
                        <!-- <p class="list-details">{{$products['short_description']}}</p> -->
                           <div class="list-button">
                              <!-- <ul>
                                 <li> <a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="1" data-store="{{$storeId}}">250 ML</a></li>
                                 <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="2" data-store="{{$storeId}}">500 ML</a></li>
                                 <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="3" data-store="{{$storeId}}">1 L</a></li>
                                 </ul> -->
                           </div>
                           <div class="price-tag">
                              @if($products['price'] != $products['original_price'])
                              <p class="price-display-original">
                                 <span style="text-decoration: line-through;">
                                 {{$currency}} {{$products['original_price']}}
                                 </span>
                              </p>
                              @endif
                              <p class="price-display">{{$currency}} {{$products['price']}}</p>
                           </div>
                        </div>
                     </div>
                     <div class="buy-now-button">
                        <!-- <button class="buy-now-btn" data-product-size-id="1" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button> -->
                     </div>
                  </div>
                  <div id="popupBox-cart" class="popup-cart">
                     <div class="popup-content-cart">
                        <span id="closeBtn-cart" class="close-cart">&times;</span>
                        <h2>Item Added to Cart!</h2>
                        <p>Your item has been added to the cart successfully.</p>
                        <button  class="view-cart-popup-box" id="viewCartBtn">View Cart</button>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
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
             const quantityInput = document.getElementById('quantity-product-deatil');
             quantityInput.value = parseInt(quantityInput.value) + 1;
         }
         
         function decrement() {
             const quantityInput = document.getElementById('quantity-product-deatil');
             if (quantityInput.value > 1) {
                 quantityInput.value = parseInt(quantityInput.value) - 1;
             }
         }
         
      </script>
      <script></script>
      <script>
         // Function to show the popup
         function showPopup(message) {
         $('#popupBox-cart .popup-content-cart p').text(message);
         $('#popupBox-cart').addClass('active');
         
         // Automatically remove the popup after 3 seconds
         setTimeout(function() {
         $('#popupBox-cart').removeClass('active');
         }, 3000); // 3000 milliseconds = 3 seconds
         }
         
         $(document).on('click', '#closeBtn-cart', function() {
         $('#popupBox-cart').removeClass('active');
         });
         
         $(document).on('click', function(event) {
         if ($(event.target).is('#popupBox-cart')) {
         $('#popupBox-cart').removeClass('active');
         }
         });
         
         document.addEventListener('DOMContentLoaded', () => {
   const thumbCarousel = document.querySelectorAll('#thumbCarousel .thumb');
   const myCarousel = document.getElementById('myCarousel');

   // Activate thumbnail on click
   thumbCarousel.forEach((thumb, index) => {
      thumb.addEventListener('click', function () {
         // Remove active class from all thumbnails
         thumbCarousel.forEach(t => t.classList.remove('active'));
         // Add active class to the clicked thumbnail
         this.classList.add('active');
      });
   });

   // Sync thumbnail with carousel slide change
   myCarousel.addEventListener('slide.bs.carousel', function (event) {
      const index = event.to; // Index of the target slide
      // Remove active class from all thumbnails
      thumbCarousel.forEach(t => t.classList.remove('active'));
      // Add active class to the corresponding thumbnail
      document.querySelector(`#thumbCarousel .thumb[data-bs-slide-to="${index}"]`).classList.add('active');
   });
});




         $(document).on('click', '.add-cart-btn', function() {
         var productSizeId = $(this).data('product-size-id');
         var storeId = $(this).data('store-id');
         
         // Update the Buy Now and Add to Cart buttons
         $('#buy-now-btn').data('product-size-id', productSizeId);
         $('#add-now-btn').data('product-size-id', productSizeId);
         
         $.ajax({
         url: '{{ url("get-product-price") }}',
         method: 'GET',
         data: {
           product_size_id: productSizeId,
           store_id: storeId
         },
         success: function(response) {
           $('#price-display').text(response.currency + ' ' + response.price);
           if (response.original_price != response.price) {
         
            $('#price-display-original').html(
         '<span style="text-decoration: line-through;">' +
         response.currency + ' ' + response.original_price +
         '</span>'
         );
         }
         else{
         $('#price-display-original').text('');
         }
         },
         error: function() {
           alert('Failed to fetch the price. Please try again.');
         }
         });
         });
         
         
         $(document).ready(function () {
         $(document).on('click', '#buy-now-btn', function() {
         var productSizeId = $(this).data('product-size-id');
         var storeId = $(this).data('store-id');
         var quantityInput= $('.cartquantity').val();
         
         if (!quantityInput) {
           alert('Quantity input not found. Please try again.');
           return; // Exit if the input is missing
         }
         
         var quantity = quantityInput;
         if (!productSizeId) {
         alert('Please select a size before proceeding.');
         return;
         }
         
         $.ajax({
         url: '{{ url("cart/add") }}',
         method: 'GET',
         data: {
           _token: '{{ csrf_token() }}',
           product_size_id: productSizeId,
           store_id: storeId,
           quantity: quantity
         },
         success: function() {
           window.location.href = '{{ url("checkout") }}';
         },
         error: function() {
           alert('Failed to add product to cart. Please try again.');
         }
         });
         });
         });
         
         $(document).on('click', '#add-now-btn', function() {
         var productSizeId = $(this).data('product-size-id');
         var storeId = $(this).data('store-id');
         var quantityInput= $('.cartquantity').val();
         
         if (!quantityInput) {
           alert('Quantity input not found. Please try again.');
           return; // Exit if the input is missing
         }
         
         var quantity = quantityInput;
         if (!productSizeId) {
         alert('Please select a size before proceeding.');
         return;
         }
         
         $.ajax({
         url: '{{ url("cart/add") }}',
         method: 'GET',
         data: {
           _token: '{{ csrf_token() }}',
           product_size_id: productSizeId,
           store_id: storeId,
           quantity: quantity
         },
         success: function(response) {
           showPopup('Product added to cart successfully!');
         },
         error: function() {
          showPopup('Failed to add product to cart. Please try again.');
         }
         });
         });
         
         
         $(document).ready(function() {
   // Handle click event on <a> elements
   $('.product-list-button ul li a').on('click', function() {
      // Toggle 'selected-productlist' class on the clicked <a>
      $(this).toggleClass('selected-productlist');
   });
});

      </script>
   </body>
</html>