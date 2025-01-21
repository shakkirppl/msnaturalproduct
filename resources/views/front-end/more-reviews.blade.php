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
   </head>
   <body style="background-color: #FEFDF7;">
      <!-- header start -->
      @include('front-end.include.header')
      <!-- header close -->
      <!-- view-cart-section start -->
      <section>
         <div class="product-main-div">
            <div class="blog-main">
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
                                 <button class="verified-icon-number">verified</button>
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
      <script src="js/main.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrap.popper.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/scriptfont.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   </body>
</html>