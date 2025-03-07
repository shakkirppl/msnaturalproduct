<!DOCTYPE html>
<html lang="en">
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
      <!-- header close -->
      <!-- view-cart-section start -->
      @include('front-end.include.header')
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="login-form">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="login-head">
                              <h1>{{ __('main.Signup') }}</h1>
                              <p>{{ __('main.Login_description') }}</p>
                           </div>
                           <!-- <hr class="hr-tag-form"> -->
                        </div>
                     </div>
                     
                     <div class="row">
                        <div class="col-md-12">
                        @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="{{ route('register-user') }}" style="max-width: 400px;">
    @csrf

    <div class="mb-2">
        <input type="text" class="form-control login-input" id="name" name="name" 
               placeholder="Enter Name" value="{{ old('name') }}" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2">
        <input type="email" class="form-control login-input" id="email" name="email" 
               placeholder="Enter Email" value="{{ old('email') }}" >
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2">
        <input type="tel" class="form-control login-input" id="phone" name="phone" 
               placeholder="Enter Phone Number" value="{{ old('phone') }}" >
        @error('phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2">
        <input type="password" class="form-control login-input" id="password" name="password" 
               placeholder="Password" required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2">
        <input type="password" class="form-control login-input" id="password_confirmation" 
               name="password_confirmation" placeholder="Confirm Password" required>
        @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="w-100 login-submit">{{ __('main.Submit') }}</button>
</form>
                        </div>
                     </div>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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