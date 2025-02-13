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
         <div class="row">
            <div class="col-md-12">
               <div class="guest-address-main">
                  <div class="about-head-desc">
                     <div class="about-head">
                        <h1>Our Story</h1>
                     </div>
                     <div class="about-head-para">
                        <p>Welcome to MS Natural Products, where nature meets beauty and wellness. Our range of meticulously crafted hair oils and skincare oils harnesses the power of herbs to deliver outstanding results.
                        </p>
                        <p>At MS Natural Products, we understand the importance of natural ingredients in enhancing beauty and promoting overall well-being. That's why we handpick the finest herbs and botanicals to create our products, ensuring that every drop is infused with goodness straight from nature.</p>
                        <p>Our hair oils are specially formulated to nourish and strengthen your hair from root to tip, promoting healthy growth and a vibrant shine. Whether you're dealing with dryness, breakage, or frizz, our hair oils are here to restore your locks to their full glory.</p>
                        <div class="about-img">
                           <div class="row">
                              <!-- <div class="col-md-4">
                                 <img  src="{{URL::to('/')}}/front-end/images/about-us/1.png" alt="Cart Icon" class="w-100"
                                  />
                                 </div> -->
                              <div class="col-md-6">
                                 <img  src="{{URL::to('/')}}/front-end/images/about-us/2.png" alt="Cart Icon" class="w-100"
                                    />
                              </div>
                              <div class="col-md-6">
                                 <img  src="{{URL::to('/')}}/front-end/images/about-us/3.png" alt="Cart Icon" class="w-100"
                                    />
                              </div>
                           </div>
                        </div>
                        <p>For radiant and glowing skin, look no further than our skincare oils. Packed with antioxidants and essential nutrients, our oils deeply moisturize and rejuvenate your skin, leaving it soft, smooth, and supple. Say goodbye to dullness and hello to a complexion that radiates natural beauty.</p>
                        <p>But don't just take our word for it – our products have garnered rave reviews from our loyal customers, with lakhs of satisfied users worldwide. Experience the transformative power of nature with MS Natural Products and unleash your true beauty, naturally.</p>
                        <div class="about-img">
                           <div class="row">
                              <div class="col-md-12">
                                 <img  src="{{URL::to('/')}}/front-end/images/about-us/1.png" alt="Cart Icon" class="w-100"
                                    />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </dov>
         </div>
      </section>
      <div class="about-head">
                        <h1 class="gallery-head">{{ __('main.Gallery') }}</h1>
                     </div>
                     <div class="about-head-para">
                    
                        <div class="about-img">
                           <div class="row">
                              <!-- <div class="col-md-4">
                                 <img  src="https://test.myfezto.com/front-end/images/about-us/1.png" alt="Cart Icon" class="w-100"
                                  />
                                 </div> -->
                              <div class="col-md-4 gallery-img">
                                 <img src="https://test.myfezto.com/front-end/images/about-us/2.png" alt="Cart Icon">
                              </div>
                              <div class="col-md-4 gallery-img">
                                 <img src="https://test.myfezto.com/front-end/images/about-us/3.png" alt="Cart Icon">
                              </div>
                              <div class="col-md-4 gallery-img">
                                 <img src="https://test.myfezto.com/front-end/images/about-us/2.png" alt="Cart Icon">
                              </div>
                              <div class="col-md-4 gallery-img">
                                 <img src="https://test.myfezto.com/front-end/images/about-us/3.png" alt="Cart Icon">
                              </div>
                           </div>
                        </div>
                        </div>
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