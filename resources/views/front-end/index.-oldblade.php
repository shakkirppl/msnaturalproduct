<!DOCTYPE html>
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
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
   <!-- mr dafoe -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="{{url('favicon.ico')}}" />
</head>
<body>
   <div class="top-header">
      <div class="container">
         <div class="row">
            <!-- <div class="col-md-2 m-auto">
               <div class="top-first-head">
                  <h1>{{ __('main.Splash') }}</h1>
               </div>
               </div> -->
            <div class="col-md-12">
               <div class="top-second-head">
                  <h1>{{ __('main.site_to') }}</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section>
      <div class="banner-main">
         <img src="{{URL::to('/')}}/front-end/images/homebanner/banner3.png" alt="Banner Image" class="banner-img">
         <div class="main-header-contents">
            <!-- <h1  class="center-heading">{{ __('main.ms_natural_products') }} </h1> -->
         </div>
         <!-- header -->
         @include('front-end.include.header')
      </div>
   </section>
   <section>
      <div class="second-banner">
         <img src="{{URL::to('/')}}/front-end/images/homebanner/second-banner-img.png" alt="">
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/homebanner/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>{{ __('main.our_products') }}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <!-- <a href=""> -->
               <div class="product-box">
                  <a href="{{url('product-view/hair-care-oil')}}">
                     <div class="product-box-img">
                        <img src="{{url('uploads/products/hair-oil.png')}}" alt="">
                     </div>
                  </a>
                  <div class="product-box-banner-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/our-product-below-banner.png" alt="">
                     <div class="product-box-details-content-bottom">
                        <a href="{{url('product-view/hair-care-oil')}}">
                           <div class="product-box-contents-details">
                              <h1>{{ __('main.hair_oil_name') }}</h1>
                           </div>
                        </a>
                        <p class="list-details">{{ __('main.hair_oil_short_description') }}</p>
                        <div class="list-button">
                           <ul>
                              <li> <a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="1" data-store="{{$storeId}}">250 ML</a></li>
                              <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="2" data-store="{{$storeId}}">500 ML</a></li>
                              <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="3" data-store="{{$storeId}}">1 L</a></li>
                           </ul>
                        </div>
                        <div class="price-tag">
                           @if($hair_oil->original_price != $hair_oil->offer_price)
                           <p class="price-display-original">
                              <span style="text-decoration: line-through;">
                              {{$currency}} {{$hair_oil->original_price}}
                              </span>
                           </p>
                           @endif
                           <p class="price-display">{{$currency}} {{$hair_oil->offer_price}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="buy-now-button">
                     <button class="buy-now-btn" data-product-size-id="1" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
                  </div>
               </div>
               <!-- </a> -->
            </div>
            <div class="col-md-4">
               <div class="product-box">
                  <a href="{{url('product-view/skin-care-oil')}}">
                     <div class="product-box-img">
                        <img src="{{url('uploads/products/skin-care.png')}}" alt="">
                     </div>
                  </a>
                  <div class="product-box-banner-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/our-product-below-banner.png" alt="">
                     <div class="product-box-details-content-bottom">
                        <a href="{{url('product-view/skin-care-oil')}}">
                           <div class="product-box-contents-details">
                              <h1>{{ __('main.skin_oil_name') }}</h1>
                           </div>
                        </a>
                        <p class="list-details">{{ __('main.skin_oil_short_description') }}</p>
                        <div class="list-button">
                           <ul>
                              <li> <a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="4" data-store="{{$storeId}}">250 ML</a></li>
                              <li><a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="5" data-store="{{$storeId}}">500 ML</a></li>
                              <li><a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="6" data-store="{{$storeId}}">1 L</a></li>
                           </ul>
                        </div>
                        <div class="price-tag">
                           @if($skin_oil->original_price != $skin_oil->offer_price)
                           <p class="price-display-original">
                              <span style="text-decoration: line-through;">
                              {{$currency}} {{$skin_oil->original_price}}
                              </span>
                           </p>
                           @endif
                           <p class="price-display">
                              {{$currency}} {{$skin_oil->offer_price}}
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="buy-now-button">
                     <button class="buy-now-btn" data-product-size-id="4" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
                  </div>
               </div>
            </div>
            @if($face_pack)
            <div class="col-md-4">
               <a href="">
                  <div class="product-box">
               <a href="{{url('product-view/face-pack-powder')}}">
               <div class="product-box-img">
               <img src="{{url('uploads/products/face-pack.png')}}" alt="">
               </div>
               </a>
               <div class="product-box-banner-img">
               <img src="{{URL::to('/')}}/front-end/images/ourproduct/our-product-below-banner.png" alt="">
               <div class="product-box-details-content-bottom">
               <a href="{{url('product-view/face-pack-powder')}}">
               <div class="product-box-contents-details">
               <h1>{{ __('main.face_pack_name') }}</h1>
               </div>
               </a>
               <p class="list-details">{{ __('main.face_pack_short_description') }}</p>
               <div class="list-button">
               </div>
               <div class="price-tag">
               @if($face_pack->original_price != $face_pack->offer_price)
               <p class="price-display-original">
               <span style="text-decoration: line-through;">
               {{$currency}} {{$face_pack->original_price}}
               </span>
               </p>
               @endif
               <p>{{$currency}} {{$face_pack->offer_price}}</p>
               </div>
               </div>
               </div>
               <div class="buy-now-button">
               <button class="buy-now-btn" data-product-size-id="7" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
               </div>
               </div>
               </a>
            </div>
            @endif
         </div>
      </div>
   </section>
   <section class="combo-main">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/homebanner/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>{{ __('main.Combo_Pack') }}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-6 combo-pack">
               <!-- <img class="combo-pack-left-img " style="" src="{{URL::to('/')}}/front-end/images/comboproduct/left side leaf.png" alt=""> -->
               <div class="combo-pack-box combo-box-first" style="margin-bottom:60px;">
                  <div class="combo-box-one">
                     <a href="{{url('product-view/hair-care-oil-250ml-skin-care-oil-250ml-combo')}}">
                        <img class="w-100" style="" src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg1.png" alt="">
                        <div class="combo-box-contents">
                           <h1>{{ __('main.250ml_Combo') }}</h1>
                        </div>
                        <div class="combo-box-price-div">
                           @if($combo_250ml->original_price != $combo_250ml->offer_price)
                     <a  class="combo-box-price">
                     <span style="text-decoration: line-through; font-size:16px;">
                     {{$currency}} {{$combo_250ml->original_price}}
                     </span>
                     </a>
                     <br>
                     @endif
                     <a  class="combo-box-price">{{$currency}} {{$combo_250ml->offer_price}}</a>
                     </div>
                     </a>
                     <div class="combo-box-contents-bottom">
                        <button class="buy-now-btn" data-product-size-id="8" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <a href="{{url('product-view/hair-care-oil-250ml-skin-care-oil-250ml-combo')}}">
                     <img class="w-100" style="" src="{{url('uploads/products/250-combo.png')}}" alt="">
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-md-6 combo-pack">
               <div class="combo-pack-box combo-box-second"  style="margin-bottom:60px;">
                  <div class="combo-box-one">
                     <a href="{{url('product-view/hair-care-oil-500ml-skin-care-oil-500ml-combo')}}">
                        <img class="w-100" style=""  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg2.png" alt="">
                        <div class="combo-box-contents">
                           <h1>{{ __('main.500ml_Combo') }}</h1>
                           <!-- <a href="" class="combo-box-price">Rs. 939.00</a> -->
                        </div>
                        <div class="combo-box-price-div">
                           @if($combo_500ml->original_price != $combo_500ml->offer_price)
                     <a  class="combo-box-price">
                     <span style="text-decoration: line-through;  font-size:16px;">
                     {{$currency}} {{$combo_500ml->original_price}}
                     </span>
                     </a>
                     <br>
                     @endif
                     <a  class="combo-box-price">{{$currency}} {{$combo_500ml->offer_price}}</a>
                     </div>
                     </a>
                     <div class="combo-box-contents-bottom">
                        <button class="buy-now-btn" data-product-size-id="9" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <a href="{{url('product-view/hair-care-oil-500ml-skin-care-oil-500ml-combo')}}">
                     <img class="w-100" style=""  src="{{url('uploads/products/500-combo.png')}}" alt="">
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-md-6 combo-pack">
               <div class="combo-pack-box  combo-box-first">
                  <div class="combo-box-one ">
                     <a href="{{url('product-view/1-l-hair-care-oil-1-l-skin-care-oil-combo')}}">
                        <img class="w-100" style=""  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg3.png" alt="">
                        <div class="combo-box-contents">
                           <h1>{{ __('main.1_L_Combo') }}</h1>
                           <!-- <a href="" class="combo-box-price">Rs. 939.00</a> -->
                        </div>
                        <div class="combo-box-price-div">
                           @if($combo_1l->original_price != $combo_1l->offer_price)
                     <a  class="combo-box-price">
                     <span style="text-decoration: line-through;font-size:16px;">
                     {{$currency}} {{$combo_1l->original_price}}
                     </span>
                     </a>
                     <br>
                     @endif
                     <a class="combo-box-price">{{$currency}} {{$combo_1l->offer_price}}</a>
                     </div>
                     </a>
                     <div class="combo-box-contents-bottom">
                        <button class="buy-now-btn" data-product-size-id="11" data-store-id="{{$storeId}}">{{ __('main.BUY_NOW') }}</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <a href="{{url('product-view/1-l-hair-care-oil-1-l-skin-care-oil-combo')}}">
                     <img class="w-100" style=""  src="{{url('uploads/products/1liture-combo.png')}}" alt="">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="middle-line"></div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="oil-desc-main">
         <div class="container">
            <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
            <div class="oil-desc">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-head">
                           <h4>{{ __('main.ms_natural_products') }}</h4>
                           <h1>{{ __('main.hair_oil_name') }}</h1>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="oil-desc-img">
                           <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Product img.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-des">
                           <p>{{ __('main.hair_oil_description') }}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="oil-desc-main">
         <div class="container">
            <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
            <div class="oil-desc">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-des">
                           <p>{{ __('main.skin_oil_description') }}</p>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="oil-desc-img">
                           <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/Skin care oil Product img.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-head">
                           <h4>{{ __('main.ms_natural_products') }}</h4>
                           <h1>{{ __('main.skin_oil_name') }}</h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @if($face_pack)
      <div class="oil-desc-main">
         <div class="container">
            <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
            <div class="oil-desc">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-head">
                           <h4>{{ __('main.ms_natural_products') }}</h4>
                           <h1>{{ __('main.face_pack_name') }}</h1>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="oil-desc-img">
                           <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/face pack Product img.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-des">
                           <p>{{ __('main.face_pack_description') }}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endif
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="middle-line"></div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/homebanner/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>{{ __('main.Video_Gallery') }}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="insta-main">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="insta-head">
                  <h1>{{ __('main.Instagram') }}</h1>
               </div>
            </div>
         </div>
         <!-- <div class="row">
            <div class="insta-gram-slider">
               <div class="owl-carousel owl-theme" id="instagram-slider">
                  @foreach($videoYoutube as $instagram)
                  <div class="item">
                     <div class="insta-img">
                        <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DCJdVmhKbBk/" data-instgrm-version="14" style="background:#FFF; border:0; margin:1px; max-width:540px; min-width:326px; width:100%; padding:0;">
                           <div style="padding:16px;">
                              <a href="https://www.instagram.com/reel/DCJdVmhKbBk/" target="_blank" style="text-align:center;">
                              View this post on Instagram
                              </a>
                           </div>
                        </blockquote>
                        <script async src="//www.instagram.com/embed.js"></script>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            </div> -->
         <div class="row">
            <div class="insta-gram-slider">
               <div class="owl-carousel owl-theme" id="instagram-slider">
                  @foreach($videoYoutube as $instagram)
                  <div class="item">
                     <div class="insta-img">
                        <div class="background-img">
                           <img src="{{URL::to('/')}}/front-end/images/Instagram/testi-img.png" alt="Background Image">
                        </div>
                        <!-- <a href="https://www.instagram.com/reel/DCJdVmhKbBk/"> View this post on Instagram</a> -->
                        <!-- Instagram Embed Block -->
                        <blockquote 
                           data-instgrm-permalink="https://www.instagram.com/reel/DCJdVmhKbBk/" 
                           data-instgrm-version="14" 
                           style="background:#FFF; border:0; margin:auto;height:200px; max-width:100%; width:100%; padding:0;"
                           >
                           <div style="padding:16px; text-align:center;">
                              <a href="https://www.instagram.com/reel/DCJdVmhKbBk/" target="_blank" style="text-align:center;">
                              View this post on Instagram
                              </a>
                           </div>
                        </blockquote>
                        <!-- Instagram Icon Overlay -->
                        <div class="insta-icon-overlay">
                           <a href="https://www.instagram.com/reel/DCJdVmhKbBk/" target="_blank">
                              <i class="fa fa-instagram"></i> <!-- Instagram Icon -->
                           </a>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!-- Instagram Embed Script (load once at the end) -->
         <script async src="//www.instagram.com/embed.js"></script>
      </div>
   </section>
   <section class="youtube-main">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="youtube-head">
                  <h1>{{ __('main.Youtube') }}</h1>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="youtube-slider">
               <div class="owl-carousel owl-theme" id="youtube-slider">
                  @foreach($videoYoutube as $youtube)
                  <div class="item">
                     <div class="youtube-video">
                        <iframe style="height: 330px; width: 100%;" 
                           src="https://www.youtube.com/embed/{{ $youtube->video }}" 
                           frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                           allowfullscreen>
                        </iframe>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/homebanner/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>{{ __('main.What_People_Say') }}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="testimonial-slider">
               <div class="owl-carousel owl-theme" id="testimonial-slider">
                  <div class="item">
                     <div class="testimonial-slider">
                        <img src="{{URL::to('/')}}/front-end/images/What People Say/what people say background.png" alt="">
                        <div class="testimonial-contents">
                           <h1>MS Natural products is a one-stop beauty destination that gives you access to a comprehensive range of Cosmetics, Skincare, Haircare.</h1>
                           <div class="testi-img">
                              <!-- <img src="{{URL::to('/')}}/front-end/images/testi-img.png" alt=""> -->
                           </div>
                           <div class="testiname">
                              <h1>THASKIN  OG</h1>
                           </div>
                        </div>
                     </div>
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
   <script>window.instgrm.Embeds.process();</script>
   <script>
      $('#instagram-slider').owlCarousel({
        loop: true,
      //   autoplay:true,
        margin: 10,
        nav: true,
        dots:false,
        navText: [
      "<img src='{{ asset('front-end/images/Instagram/left Rounded Arrow.png') }}' alt='Previous'>",
      "<img src='{{ asset('front-end/images/Instagram/right Rounded Arrow.png') }}' alt='Next'>"
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
        autoplay:true,
        nav: true,
        dots:false,
        navText: [
      "<img src='{{ asset('front-end/images/Instagram/left Rounded Arrow.png') }}' alt='Previous'>",
      "<img src='{{ asset('front-end/images/Instagram/right Rounded Arrow.png') }}' alt='Next'>"
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
        nav: false,
        autoplay:true,
        dots:false,
        navText: [
      "<img src='{{ asset('front-end/images/What People Say/what people say right arrow.png') }}' alt='Previous'>",
      "<img src='{{ asset('front-end/images/What People Say/what people say left arrow.png') }}' alt='Next'>"
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
      var $logo = $('.logo'); // Target your logo element here
      var offsetTop = $bottomHeader.offset().top;
      var lastScrollTop = 0;
      
      $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();
      
      if (scrollTop > offsetTop) {
         $bottomHeader.addClass('sticky');
         $logo.addClass('shrink-logo'); // Add class to shrink the logo
      
         // Check scroll direction for additional adjustments if needed
         if (scrollTop > lastScrollTop) {
            $bottomHeader.css('top', '0px');
         } else {
            $bottomHeader.css('top', '0');
         }
      } else {
         $bottomHeader.removeClass('sticky');
         $logo.removeClass('shrink-logo'); // Remove class to reset logo size
         $bottomHeader.css('top', '0');
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
      $(document).on('click', '.add-cart-btn', function() {
      var productSizeId = $(this).data('pro_id');
      var storeId = $(this).data('store');
      
      // Find the closest product-box to update only that specific price display
      var $productBox = $(this).closest('.product-box');
      $productBox.find('.buy-now-btn').data('product-size-id', productSizeId);
      $.ajax({
      url: '{{ url("get-product-price") }}',
      method: 'GET',
      data: {
         product_size_id: productSizeId,
         store_id: storeId
      },
      success: function(response) {
         // Update only the price display in the clicked product box
         $productBox.find('.price-display').text(response.currency + ' ' + response.price);
         if (response.original_price != response.price) {
         
            $productBox.find('.price-display-original').html(
      '<span style="text-decoration: line-through;">' +
      response.currency + ' ' + response.original_price +
      '</span>'
      );
         }
         else{
            $productBox.find('.price-display-original').text('');
         }
         
      },
      error: function() {
         alert('Failed to fetch the price. Please try again.');
      }
      });
      });
      $(document).on('click', '.buy-now-btn', function() {
      var productSizeId = $(this).data('product-size-id');
      var storeId = $(this).data('store-id');
      // alert(storeId);
      if (!productSizeId) {
      alert('Please select a size before proceeding.');
      return;
      }
      
      $.ajax({
      url: '{{ url("cart/add") }}', // This is the route for adding items to the cart
      method: 'GET',
      data: {
         _token: '{{ csrf_token() }}',
         product_size_id: productSizeId,
         store_id:storeId,
         quantity: 1
      },
      success: function(response) {
         // Redirect to the checkout page upon successful addition to cart
         window.location.href = '{{ url("checkout") }}';
      },
      error: function() {
         alert('Failed to add product to cart. Please try again.');
      }
      });
      });
   </script>
   <script>
      const listItems = document.querySelectorAll('ul li');
      let selectedItems = []; // Array to track selected items
      
      listItems.forEach((li) => {
      li.addEventListener('click', function () {
       // Toggle the 'active' class for the clicked item
       if (this.classList.contains('active')) {
          this.classList.remove('active');
          // Remove from selectedItems array
          selectedItems = selectedItems.filter(item => item !== this);
       } else {
          // Check if two items are already selected
          if (selectedItems.length < 2) {
             this.classList.add('active');
             selectedItems.push(this); // Add to selectedItems array
          } else {
             alert('You can select a maximum of two items.');
          }
       }
      });
      });
      
   </script>
</body>
</html>