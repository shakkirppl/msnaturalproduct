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
            <div class="blog-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                        data-aos-duration="1500">
                        <h1>{{ __('main.Youtube') }}</h1>
                    </div>
                </div>
            </div>
            <div class="review-list-main">
                <div class="row">
                @foreach($videoYoutube as $youtube)
               
                    <div class="col-md-3 col-6">
                    <a href="{{ $youtube->video }}">
                        <div class="video-gallery-img">
                            <img src="{{ url('uploads/video/' . $youtube->image) }}" alt="">
                        </div> </a>
                    </div>
               
                   @endforeach
                 
                </div>
            </div>
        </div>
        </div>
    </section>
    <section>
        <div class="product-main-div">
            <div class="blog-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="ms-product-head" data-aos="fade-down" data-aos-anchor-placement="top-bottom"
                        data-aos-duration="1500">
                        <h1>{{ __('main.Instagram') }}</h1>
                    </div>
                </div>
            </div>
            <div class="review-list-main">
                <div class="row">
                @foreach($videoInstagram as $instagram)
               
                    <div class="col-md-3 col-6"> <a href="{{ $instagram->video }}">
                        <div class="video-gallery-img">
                            <img src="{{ url('uploads/video/' . $instagram->image) }}" alt="">
                        </div>
                        </a>
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