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
      .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.btn-link {
    text-decoration: none;
    font-size: 14px;
}
.btn-sm {
    font-size: 14px;
    margin-right: 5px;
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
                  <h1>{{ __('main.Address') }}</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="your-address-main">
            <div class="row">
               <div class="col-md-6">
               <div class="your-order-contents">
                  <form action="{{ url('update.shipping-address') }}" id="billingForm" method="POST">
                  @csrf
                     
                        <div class="your-order-head mb-2">
                           <div class="row">
                              <div class="col-md-12">
                                 <h1 class="address-head">{{ __('main.Update_Shipping_Addresses') }}</h1>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                              
                              <input type="hidden" name="id" class="form-control" value="{{$customerAddress->id}}" required>
                              <input type="hidden" name="store_id" class="form-control" value="{{$storeId}}" required>
                                 <select class="form-select" name="country_id" id="country_id" aria-label="Default select example">
                                    @foreach($countries as $country)
                                    @if($customerAddress->country_id==$country->id)
                                    <option selected value="{{$country->id}}">{{$country->country_name}}</option>
                                    @else
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row ">
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$customerAddress->first_name}}"  required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <input type="text" name="last_name" class="form-control" placeholder="Second Name" value="{{$customerAddress->last_name}}"  required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="text" name="address" class="form-control" placeholder="Address" value="{{$customerAddress->address}}"  required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="text" name="landmark" class="form-control" placeholder="Apartment, Suite , etc. (optional)"  value="{{$customerAddress->landmark}}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <input type="text" name="city" class="form-control" placeholder="City" value="{{$customerAddress->city}}"  required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <select class="form-select" name="state" id="state" aria-label="Default select example">
                                   
                              @foreach($billingStates as $billig)
                                 <option value="{{$billig->id}}">{{$billig->state_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                       
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="mb-3">
                              <input type="text" class="form-control" name="pincode"  placeholder="Pin Code" value="{{$customerAddress->pincode}}" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                           <input type="text" class="form-control" name="phone_number"  placeholder="Phone Number" value="{{$customerAddress->phone_number}}" required>
                           </div>
                       
                        </div>
                     
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit"  class="edit">{{ __('main.Save') }}</button>
                           </div>
                           <div class="col-md-6 text-end">
                              <button type="button" class="cancel">{{ __('main.Clear') }}</button>
                           </div>
                        </div>
                    
                  </div>
                  </form>
               </div>
          
            </div>
         </div>
      </div>
      <section>
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
      $(document).ready(function() {
         $('#country_id').change(function() {
             var countryId = $(this).val();
             
             if(countryId) {
                 $.ajax({
                     url: "{{ route('get-states', ['countryId' => ':countryId']) }}".replace(':countryId', countryId),
                     type: 'GET',
                     success: function(response) {
                         // Clear the previous options
                         $('#state').empty();
                         // Add a default "Select" option
                        
         
                         // Append the new states
                         $.each(response.states, function(key, state) {
                             $('#state').append('<option value="'+ state.id +'">'+ state.state_name +'</option>');
                         });
                     },
                     error: function() {
                         alert('Failed to load states.');
                     }
                 });
             }
         });
         });
         </script> 
   </body>
</html>