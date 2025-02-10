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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" />
   </head>
   <body>
      @include('front-end.include.header')
      <!-- main slider start -->
      <section class="main-slider">
         <div class="swiper mySwiper">
            <div class="swiper-wrapper">
               <div class="swiper-slide">
                  <div class="swiper-slide">
                     <img src="{{URL::to('/')}}/uploads/banner/banner-hair.png" class="hero-image w-100 desktop-view" alt="">
                     <img src="{{URL::to('/')}}/front-end/images/banner/mobile-banner.png" class="hero-image w-100 mobile-view" alt="">
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="swiper-slide">
                     <img src="{{URL::to('/')}}/uploads/banner/banner-skin.png" class="hero-image w-100  desktop-view" alt="">
                     <img src="{{URL::to('/')}}/front-end/images/banner/mobile-banner.png" class="hero-image w-100 mobile-view" alt="">
                  </div>
               </div>
             
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
         </div>
      </section>
      <!-- main slider close -->
      <!-- product section start -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.Product') }}</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-md-6">
                  <div class="product-container">
                     <div class="product-card">
                        <div class="product-layout">
                           <div class="product-image-column">
                              <a href="{{ route('product.view', $product->product_slug) }}">
                              <img loading="lazy" src="{{ url('uploads/products/' . $product->image) }}" class="product-image"
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
                                 <h1 class="product-title">{{$product->name}}</h1>
                                 <h2 class="product-subtitle">
                                    {{$product->short_description}}
                                 </h2>
                                 @foreach($product->baseprices as $prices)
                                 <div class="price-container">
                                    <div class="price-original">
                                       {{$prices->currency}}<span class="price-bold">{{$prices->offer_price}}</span>
                                    </div>
                                    <div class="price-discounted">
                                       {{$prices->currency}}<span class="price-bold">{{$prices->original_price}}</span>
                                    </div>
                                    @endforeach
                                 </div>
                                 <div class="buy-now-button">
                                 <button data-product-size-id="{{$product->id}}" data-store-id="{{$storeId}}" class="add-to-cart">Add To Cart </button>
                                 </div>
                                 <div class="popup-cart" id="popup-cart" style="display: none;">
                                    <div class="popup-content-cart">
                                       <p id="popup-message">Item added to cart!</p>
                                       <button class="close-popup-cart" id="close-popup-cart">Close</button>
                                    </div>
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
            <div class="section-end-line">
            </div>
         </div>
      </section>
      <!-- product section close -->
      <!-- combo pack start -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.Combo_Pack') }}</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($productsCombo as $product)
               <div class="col-md-6">
                  <div class="product-card-combo">
                     <div class="product-container-combo">
                        <div class="product-layout-combo">
                           <div class="product-image-wrapper-combo">
                           <a href="{{ route('product.view', $product->product_slug) }}">
                              <img loading="lazy" src="{{ url('uploads/products/' . $product->image) }}" class="product-image-combo"
                                 alt="Hair Care Oil and Skin Care Oil Combo Pack" />
                           </div>
                        </a>
                           <div class="product-info-combo">
                              <div class="product-details-combo">
                                 <div class="product-title-combo">
                                    {{$product->name}}
                                 </div>
                                 @foreach($product->baseprices as $prices)
                                 <div class="price-container-combo">
                                    <div class="original-price-combo">
                                       {{$prices->currency}}<span class="price-bold-combo">{{$prices->offer_price}}</span>
                                    </div>
                                    <div class="discounted-price-combo">
                                       {{$prices->currency}}<span class="price-bold-combo">{{$prices->original_price}}</span>
                                    </div>
                                 </div>
                                 @endforeach
                                 <div class="buy-now-button-combo">
                                 <button data-product-size-id="{{$product->id}}" data-store-id="{{$storeId}}" class="add-to-cart">Add To Cart </button>
                                 </div>
                                 <div class="popup-cart" id="popup-cart" style="display: none;">
                                    <div class="popup-content-cart">
                                       <p id="popup-message">Item added to cart!</p>
                                       <button class="close-popup-cart" id="close-popup-cart">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="section-end-line" style="background-color: #FDE7C1;">
            </div>
         </div>
      </section>
      <!-- combo pack end -->
      <!-- product slider -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="product-slider">
                     <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class=" swiper  mySwiper-product">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="swiper-zoom-container">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="div-zoom-img">
                                          <img class="w-100" src="{{URL::to('/')}}/uploads/product-testimonial/hair.png"
                                             alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-8 div-zoom-contents">
                                       <div class="div-zoom-container">
                                          <h6>{{ __('main.ms_natural_products') }}</h6>
                                          <h1>{{ __('main.hair_oil_name') }}</h1>
                                          <p>{{ __('main.hair_oil_description') }}.
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="swiper-zoom-container">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="div-zoom-img">
                                          <img class="w-100" src="{{URL::to('/')}}/uploads/product-testimonial/skin.png"
                                             alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-8 div-zoom-contents">
                                       <div class="div-zoom-container">
                                          <h6>{{ __('main.ms_natural_products') }}</h6>
                                          <h1>{{ __('main.skin_oil_name') }}</h1>
                                          <p>{{ __('main.skin_oil_description') }}.
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="swiper-zoom-container">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="div-zoom-img">
                                          <img class="w-100" src="{{URL::to('/')}}/uploads/product-testimonial/face.png"
                                             alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-8 div-zoom-contents">
                                       <div class="div-zoom-container">
                                          <h6>{{ __('main.ms_natural_products') }}</h6>
                                          <h1>{{ __('main.face_pack_name') }}</h1>
                                          <p>{{ __('main.face_pack_description') }}
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-end-line" style="background-color: #FDE7C1;">
            </div>
         </div>
      </section>
      <!-- end product slider -->
      <!-- start video slider -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.Video_Gallery') }}</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div  class="swiper Video-gallery-swiper-youtube">
                     <div class="swiper-wrapper">
                        @foreach($videoInstagram as $instagram)
                       
                           <div class="swiper-slide">
                           <a href="{{ $instagram->video }}">
                              <img src="{{ url('uploads/video/' . $instagram->image) }}" alt="">
                              </a>
                           </div>
                     
                        @endforeach
                     </div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div  class="swiper Video-gallery-swiper-insta">
                     <div class="swiper-wrapper">
                        @foreach($videoYoutube as $youtube)
                        
                           <div class="swiper-slide">
                           <a href="{{ $youtube->video }}">
                              <img src="{{ url('uploads/video/' . $youtube->image) }}" alt="">
                              </a>
                           </div>
                      
                        @endforeach
                     </div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>
            </div>
            <div class="section-end-line" style="background-color: #FDE7C1;">
            </div>
         </div>
      </section>
      <!-- end video slider -->
      <!-- what people say -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.What_People_Say') }}?</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="what-people-say-main">
                     <div class="swiper  what-people-say ">
                        <div class="swiper-wrapper">
                           @foreach($testimonial as $testmon)
                           <div class="swiper-slide">
                              <div class="what-people-say-main-div">
                                 <div class="what-people-img">
                                    <img src="{{ url('uploads/testimonial/' . $testmon->image) }}" alt="">
                                 </div>
                                 <div class="what-people-contents">
                                    <p>{{$testmon->description}}
                                    </p>
                                 </div>
                                 <div class="what-people-head">
                                    <h1>{{$testmon->auther}}</h1>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-end-line" style="background-color: #FDE7C1;">
            </div>
         </div>
      </section>
      <!-- end what people say -->
      <!-- start visit us -->
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1500">
                     <h1>{{ __('main.Visit_Us') }}</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="visit-us-img">
                     <img src="{{URL::to('/')}}/front-end/images/visitus/v31_182.png" alt="">
                  </div>
                  <div class="visit-us-contents">
                     <div class="visit-us-logo">
                        <img src="{{URL::to('/')}}/front-end/images/visitus/v31_187.png" alt="">
                     </div>
                     <div class="visit-us-address">
                        <div class="contact-container">
                           <div class="location-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_196.png" class="icon" alt="Location pin icon" />
                              <div class="country-name">{{ __('main.India ') }}</div>
                           </div>
                           <div class="address">
                              <div> {{ __('Kondotty_Malappuram_Kerala') }}</div>
                              <div>{{ __('main.India ') }}</div>
                              <div> PIN : 673638</div>
                           </div>
                           <div class="phone-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_195.png" class="icon" alt="Phone icon" />
                              <div class="phone-number">
                                 <span class="visually-hidden">Phone number:</span>
                                 +9190487 31831
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="visit-us-img">
                     <img src="{{URL::to('/')}}/front-end/images/visitus/v31_183.png" alt="">
                  </div>
                  <div class="visit-us-contents">
                     <div class="visit-us-logo">
                        <img src="{{URL::to('/')}}/front-end/images/visitus/v31_188.png" alt="">
                     </div>
                     <div class="visit-us-address">
                        <div class="contact-container">
                           <div class="location-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_196.png" class="icon" alt="Location pin icon" />
                              <div class="country-name">India</div>
                           </div>
                           <div class="address">
                              <div> MO6-17, Unimoon Business
                                 Center,Al Bahar Building,AL Khabeesi
                              </div>
                              <div>Dubai,P.O Box No.91929</div>
                           </div>
                           <div class="phone-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_195.png" class="icon" alt="Phone icon" />
                              <div class="phone-number">
                                 <span class="visually-hidden">Phone number:</span>
                                 <div> +971 555 78 2543</div>
                                 <div> +971 555 17 5846</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="visit-us-img">
                     <img src="{{URL::to('/')}}/front-end/images/visitus/v31_185.png" alt="">
                  </div>
                  <div class="visit-us-contents">
                     <div class="visit-us-logo">
                        <img src="{{URL::to('/')}}/front-end/images/visitus/v31_190.png" alt="">
                     </div>
                     <div class="visit-us-address">
                        <div class="contact-container">
                           <div class="location-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_196.png" class="icon" alt="Location pin icon" />
                              <div class="country-name">India</div>
                           </div>
                           <div class="address">
                              <div> MO6-17, Unimoon Business Center,Al Bahar Building, AL Khabeesi</div>
                              <div>Dubai, P.O Box No.91929</div>
                           </div>
                           <div class="phone-wrapper">
                              <img loading="lazy" src="{{URL::to('/')}}/front-end/images/visitus/v31_195.png" class="icon" alt="Phone icon" />
                              <div class="phone-number">
                                 <span class="visually-hidden">Phone number:</span>
                                 <div>+971 555 78 2543</div>
                                 <div>+971 555 17 5846</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end visit -->
      <!-- start footer -->
      @include('front-end.include.footar')
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
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
               delay: 2500,
               disableOnInteraction: false,
            },
            pagination: {
               el: ".swiper-pagination",
               clickable: true,
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
         });
         
         
         var swiper = new Swiper(".mySwiper-product", {
            zoom: true,
            
            autoplay: {
               delay: 2500,
               disableOnInteraction: false,
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
            pagination: {
               el: ".swiper-pagination",
               clickable: true,
            },
          
         });
         
         
         var swiper = new Swiper(".Video-gallery-swiper-insta", {
           loop: true,
           
            //   centeredSlides: true,
            spaceBetween: 30,
            pagination: {
               el: ".swiper-pagination",
               type: "fraction",
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
            breakpoints: {
         // when window width is >= 320px
         320: {
         slidesPerView: 2,
         spaceBetween: 10
         },
         // when window width is >= 480px
         480: {
         slidesPerView: 2,
         spaceBetween: 10
         },
         // when window width is >= 640px
         640: {
         slidesPerView: 4,
         spaceBetween: 10
         }
         },
            
         });
         
         
         var swiper = new Swiper(".Video-gallery-swiper-youtube", {
           loop: true,
          
            //   centeredSlides: true,
            spaceBetween: 30,
            pagination: {
               el: ".swiper-pagination",
               type: "fraction",
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
            breakpoints: {
         // when window width is >= 320px
         320: {
         slidesPerView: 2,
         spaceBetween: 10
         },
         // when window width is >= 480px
         480: {
         slidesPerView: 2,
         spaceBetween: 10
         },
         // when window width is >= 640px
         640: {
         slidesPerView: 4,
         spaceBetween: 10
         }
         },
            
         });
         
         var swiper = new Swiper(".what-people-say", {
            slidesPerView: 1,
            centeredSlides: true,
   centeredSlidesBounds: true,
         // centeredSlides: true,     
         spaceBetween: 20,        
         loop: true,      
         autoplay: {
               delay: 2500,
               disableOnInteraction: false,
            },
         // initialSlide:0,          
         navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
         },
         pagination: {
         el: '.swiper-pagination',
         clickable: true,
         },
         
         breakpoints: {
         
         769: {
         slidesPerView: 3,
         spaceBetween: 20,
         
         // centeredSlides: true, 
         },
         
         
         },
         });
      </script>
      <!-- Initialize Swiper -->
      <script>
   $(document).ready(function () {
      // Event handler for add-to-cart button
      $(document).on('click', '.add-to-cart', function () {
         var productSizeId = $(this).attr('data-product-size-id'); // Fixed selector
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
               console.log(response); // Debug the response
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

      // Function to show the popup
      function showPopup(message) {
         $('#popup-message').text(message); // Dynamically insert the message
         $('#popup-cart').fadeIn(); // Show popup

         // Automatically hide the popup after 3 seconds
         setTimeout(function () {
            $('#popup-cart').fadeOut();
         }, 3000);
      }

      // Event handler to close the popup
      $(document).on('click', '#close-popup-cart', function () {
         $('#popup-cart').fadeOut(); // Close the popup
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

   });
</script>
   </body>
</html>