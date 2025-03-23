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
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
   </head>
   <body style="background-color: #FEFDF7;">
      <!-- header start -->
      @include('front-end.include.header')
      <!-- header close -->
      <section>
         <div class="product-main-div">
         <div class="row">
            <div class="col-md-4 col-lg-5">
               <div class="product-detail-section">
                  <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                     class="thumbnail-detail swiper mySwiper2 ">
                     <div class="swiper-wrapper">
                        @foreach($productImages as $key => $proimage)
                        <div class="swiper-slide">
                           <img src="{{ url('uploads/products/' . $proimage->image) }}" />
                        </div>
                        @endforeach
                     </div>
                     <!-- <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div> -->
                  </div>
                  <div thumbsSlider="" class="swiper thumbnail-detail-sub mySwiper">
                     <div class="swiper-wrapper">
                        @foreach($productImages as $key => $proimage)
                        <div class="swiper-slide">
                           <img src="{{ url('uploads/products/' . $proimage->image) }}" />
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-lg-7">
               <div class="product-container-detail">
                  <div class="product-background">
                     <div class="">
                        <div class="product-details-container">
                           <div class="product-layout-detail">
                              <div class="info-column">
                                 <div class="product-info-detail">
                                    <h1 class="product-title-detail">{{ $product->name }}</h1>
                                    <!-- <div class="rating-container-detail">
                                       <div class="star-rating">
                                          <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                             alt="Rating Star Icon">
                                          <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                             alt="Rating Star Icon">
                                          <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                             alt="Rating Star Icon">
                                          <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                             alt="Rating Star Icon">
                                          <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                             alt="Rating Star Icon">
                                       </div>
                                       <div class="rating-text">4.7 (39 Reviews)</div>
                                       </div> -->
                                    @if($product->short_description!=Null)
                                    <h2 class="benefits-title">{{ __('main.Made_to_solve') }}</h2>
                                    <div class="benefits-text">
                                       {{ $product->short_description!=Null }}
                                    </div>
                                    @endif
                                    <div class="price-container-detail">
                                       <div class="price-wrapper">
                                          <div class="current-price">
                                             <p class="price-display price-display-detail" id="price-display">{{ $currency }} {{ $selectedProductPrice->offer_price ?? 'N/A' }}</a>
                                          </div>
                                          @if($selectedProductPrice->original_price != $selectedProductPrice->offer_price)
                                          <div class="original-price">
                                             <p class="price-display-original" id="price-display-original"> {{$currency}} {{$selectedProductPrice->original_price}}</a>
                                          </div>
                                          @endif
                                       </div>
                                       <div class="savings-text" >{{ __('main.You_ll_save') }}<span id="offer-price-display">  {{$currency}}{{$offer}}</span></div>
                                    </div>
                                    <p class="mrp-text">({{ __('main.MRP_Inclusive_of_Taxes') }})</p>
                                    @if(count($units) > 1)
                                    <h3 class="quantity-title">{{ __('main.Quantity') }}</h3>
                                    <div class="quantity-options">
                                       <div class="options-grid">
                                          @foreach($units as $index => $unit)
                                          <a class="add-cart-btn price"  style="cursor:pointer;"
                                             data-product-size-id="{{$unit['id']}}" 
                                             data-store-id="{{ $storeId }}">
                                             <div class="option-column">
                                                <div class="option-card">
                                                   <img loading="lazy" src="{{ url('uploads/products/' . $unit['unitImage']) }}" class="option-image"
                                                      alt="250ml bottle" />
                                                   <div class="option-text">{{$unit['size']}}</div>
                                                   <div class="option-price-original">{{$unit['currency']}}{{$unit['original_price']}}</div>
                                                   <div class="option-price-current">{{$unit['currency']}}{{$unit['offer_price']}}</div>
                                                </div>
                                             </div>
                                          </a>
                                          @endforeach
                                       </div>
                                    </div>
                                    @endif
                                    <div class="action-buttons">
                                       <!-- <div class="quantity-selector" role="spinbutton" tabindex="0" aria-label="Select quantity">
                                          <button class="quantity-btn decrement" aria-label="Decrement quantity">-</button>
                                          <span class="quantity-count" aria-live="polite">1</span>
                                          <button class="quantity-btn increment" aria-label="Increment quantity">+</button>
                                          </div> -->
                                       <input type="hidden" id="quantity-product-deatil" class="cartquantity" name="cartquantity" value="1" min="1" readonly />
                                       <div><button class="add-to-cart" id="add-now-btn" data-product-size-id="{{ $selectedProductPrice->product_size_id }}" data-store-id="{{ $storeId }}">Add To Cart</button></div>
                                       <!-- Popup Box -->
                                       <!-- <div class="popup-cart" id="popup-cart">
                                          <div class="popup-content-cart">
                                             <p>Item added to cart!</p>
                                             <button class="close-popup-cart" id="close-popup-cart">Close</button>
                                          </div>
                                          </div> -->
                                       <div class="popup-cart" id="popup-cart" style="display: none;">
                                          <div class="popup-content-cart">
                                             <p id="popup-message">{{ __('main.Item_added_to_cart') }}!</p>
                                             <button class="close-popup-cart" id="close-popup-cart">{{ __('main.Close') }}</button>
                                          </div>
                                       </div>
                                       <!-- <div class="popup-cart" id="popup-cart" style="display: none;">
                                          <div class="popup-content-cart">
                                             <p id="popup-message">Item added to cart!</p>
                                             <button class="close-popup-cart" id="close-popup-cart">Close</button>
                                          </div>
                                          </div> -->
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
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="description-container">
                     <div class="description-box">
                        <h2 class="description-title"  data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                           data-aos-duration="1500">{{ __('main.Description') }}</h2>
                        <div class="description-divider"></div>
                        <p class="description-text">
                           {{$product->description}}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="description-container">
                     <div class="description-box">
                        <h2 class="description-title" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                           data-aos-duration="1500">{{ __('main.Customer_Reviews') }}</h2>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="review-head">
                              <div class="customer-review-star">
                                 <div class="star-rating-review">
                                    <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                    <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                    <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                    <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                    <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                 </div>
                                 <span>4.67 of 5</span>
                              </div>
                              <div class="review-para">
                                 <p>{{ __('main.Based_On') }} {{ __('main.Reviews') }}</p>
                                 <a href="" class="review-sub-head">
                                    <p>{{ __('main.Based_On_real_customers') }} </p>
                                 </a>
                              </div>
                              <span class="review-line"></span>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="review-slide-main">
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="star-rating-review-slider">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="review-slider">
                                       <div class="review-slider-slide">
                                          <div class="progress">
                                             <div class="progress-bar" role="progressbar" aria-label="Basic example"
                                                style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="60">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="review-slider-number">
                                       <h1>27</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <span></span>
                        </div>
                        <div class="col-md-4">
                           <a href="{{url('product-review/'.$product->id)}}">
                              <div class="review-slider-writecomment">
                                 <button class="write-review">{{ __('main.Write_a_review') }}</button>
                              </div>
                           </a>
                           <span></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="description-container">
                     <div class="description-box">
         
         
         
                        <div class="select-option-review">
                           <select class="form-select" aria-label="Default select example">
                              <option selected>Most Recent</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                        </div>
         
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </section> -->
      <section>
         <div class="product-main-div">
            <div class="review-list-main">
               <div class="row">
                  @foreach($review as $revie)
                  <div class="col-md-4">
                     <div class="review-sub-list">
                        <div class="review-list-sub-star">
                           <div class="review-list-star">
                              @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $revie->start_ratings)
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                              @else
                              @endif
                              @endfor
                              <!-- <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                 <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                 <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon">
                                 <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"alt="Rating Star Icon"> -->
                           </div>
                           <div class="review-list-date">
                              <p>{{$revie->in_date}}</p>
                           </div>
                        </div>
                        <div class="review-sub-img">
                           <div class="user-menu-icon">
                              <img src="{{URL::to('/')}}/front-end/images/header/profile.png" alt="Social Media Icon" class="social-icon-review" />
                              <div class="tick-verified">
                                 <i class="fas fa-check"></i>
                              </div>
                           </div>
                           <div class="review-sub-name">
                              <h1>@foreach($revie->user as $use)
                                 {{$use->name}}
                                 @endforeach
                              </h1>
                           </div>
                           <div class="verified-number">
                              <button class="verified-icon-number">{{ __('main.verified') }}</button>
                           </div>
                        </div>
                        <div class="review-sub-para">
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
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <a href="{{ route('product.reviews', $product->product_slug) }}">
                     <div class="load-more-main">
                        <button class="load-more-button-product">{{ __('main.Load_More') }}</button>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="product-main-div">
            <!-- <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>Video Gallery</h1>
                  </div>
               </div>
               </div> -->
            <div class="section-end-line" style="background-color: #FDE7C1;"></div>
         </div>
      </section>
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.Related_Products') }}</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($reProducts as $products)
               <div class="col-md-6">
                  <div class="product-container">
                     <div class="product-card">
                        <div class="product-layout">
                           <div class="product-image-column">
                           <a href="{{ route('product.view', $products['product_slug']) }}">
                              <img loading="lazy" src="{{ url('uploads/products/' . $products['image']) }}" class="product-image"
                                 alt="Hair Care Oil Product Image" />
                              </a>
                           </div>
                           <div class="product-info-column">
                              
                                 <div class="product-details">
                                    <!-- <div class="rating-container">
                                       <img loading="lazy" src="{{URL::to('/')}}/front-end/images/product/star_filled.png" class="rating-star"
                                          alt="Rating Star Icon" />
                                       <div class="rating-text">4.7 (39 Reviews)</div>
                                    </div> -->
                                    <a href="{{ route('product.view', $products['product_slug']) }}">
                                    <h1 class="product-title">{{$products['name']}}</h1>
                                    <h2 class="product-subtitle">
                                       {{$products['short_description']}}
                                    </h2>
                                    <div class="price-container">
                                       <div class="price-original">
                                          {{$currency}}<span class="price-bold">{{$products['price']}}</span>
                                       </div>
                                       <div class="price-discounted">
                                          {{$currency}}<span class="price-bold">{{$products['original_price']}}</span>
                                       </div>
                                    </div>
                                    </a>
                                    <div class="buy-now-button">
                                    <button data-product-id="{{$products['id']}}" data-store-id="{{$storeId}}" class="add-to-cart-related">Add To Cart </button>
                              <!-- <a href=""><button>Add To Cart</button></a> -->
                              </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  </a>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- start footer -->
      @include('front-end.include.footar')
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
      <script>
         var swiper = new Swiper(".mySwiper", {
           spaceBetween: 10,
           slidesPerView: 4,
           freeMode: true,
           watchSlidesProgress: true,
         });
         var swiper2 = new Swiper(".mySwiper2", {
           spaceBetween: 10,
           navigation: {
             nextEl: ".swiper-button-next",
             prevEl: ".swiper-button-prev",
           },
           thumbs: {
             swiper: swiper,
           },
         });
         
         // add to cart popup
         // Function to show the popup
         function showPopup(message) {
         $('.popup-message').text(message); // Dynamically insert the message
         $('.popup-cart').fadeIn();         // Show popup
         
         // Automatically hide the popup after 3 seconds
         setTimeout(function () {
         $('.popup-cart').fadeOut();
         }, 3000);
         }
         
         
         
         // Event handler to close the popup
         $(document).on('click', '.close-popup-cart', function () {
         $('.popup-cart').fadeOut(); // Close the popup
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
            if (Array.isArray(response.cartItems)) {
            updateCart(response.cartItems, response.cartTotal);
        } else {
            console.error('cartItems is not an array:', response.cartItems);
        }
            $.ajax({
                url: '{{ route("cart.count") }}',
                method: 'GET',
                success: function(data) {
                    $('.cart-no').text(data.count); // Update cart count
                },
                error: function() {
                    console.error('Failed to fetch cart count.');
                }
            });
           showPopup('Product added to cart successfully!');
         },
         error: function() {
          showPopup('Failed to add product to cart. Please try again.');
         }
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
         $('#offer-price-display').text(response.currency + ' ' + response.offer);
         
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
         
      $(document).on('click', '.add-to-cart-related', function () {
         var productSizeId = $(this).attr('data-product-id'); // Fixed selector
         var storeId = $(this).attr('data-store-id'); // Fixed selector
         var quantity = 1; // Static quantity as per your example



         if (!productSizeId || !storeId) {
            alert('Invalid product or store details.');
            return;
         }

         // AJAX request
         $.ajax({
            url: '{{ url("cart/add/home") }}',
            method: 'POST', // Changed to POST
            headers: {
               'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
               product_size_id: productSizeId,
               store_id: storeId,
               quantity: quantity
            },
            success: function(response) {
               // console.log(response); // Debug the response
        if (Array.isArray(response.cartItems)) {
            updateCart(response.cartItems, response.cartTotal);
        } else {
            console.error('cartItems is not an array:', response.cartItems);
        }
               $.ajax({
                url: '{{ route("cart.count") }}',
                method: 'GET',
                success: function(data) {
                    $('.cart-no').text(data.count); // Update cart count
                },
                error: function() {
                    console.error('Failed to fetch cart count.');
                }
            });
           
               showPopup('Product added to cart successfully!');
            },
            error: function() {
               showPopup('Failed to add product to cart. Please try again.');
            }
         });
      }); 
      function updateCart(cartItems, cartTotal) {
    var cartHtml = '';

    cartItems.forEach(function (item) {
        cartHtml += `
            <div class="row p-1">
                <div class="col-md-4 col-3 p-1">
                    <div class="cart-box-img">
                        <img src="{{ url('uploads/products/') }}/${item.attributes.image}" alt="">
                    </div>
                </div>
                <div class="col-md-8 col-9 p-1">
                    <div class="cart-box-contents">
                        <h1>${item.name}</h1>
                        <p>${item.attributes.currency} ${item.price}</p>
                        <div class="cart-box-count">
                            <div class="remove">
                                <button class="remove">
                                    <a href="{{ url('cart/remove') }}/${item.id}" class="remove-button" aria-label="Remove item">Remove</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    });

    // Update only the dynamic cart items section
    $('#cart-items-section').html(cartHtml);

    // Update the total amount
    $('.sub-total-amount h1').text(`{{$currency}} ${cartTotal}`);
}
         document.addEventListener("DOMContentLoaded", () => {
         // Target the grid container
         const optionsGrid = document.querySelector(".options-grid");
         
         // Add event delegation for dynamic option columns
         optionsGrid.addEventListener("click", (event) => {
         // Find the closest option-column element that was clicked
         const clickedColumn = event.target.closest(".option-column");
         
         if (clickedColumn) {
         // Remove the active class from all option columns
         const optionColumns = optionsGrid.querySelectorAll(".option-column");
         optionColumns.forEach((col) => col.classList.remove("active"));
         
         // Add the active class to the clicked column
         clickedColumn.classList.add("active");
         }
         });
         });
         
         
      </script>
   </body>
</html>