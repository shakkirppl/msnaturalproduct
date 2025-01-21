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
            <div class="row">
               <div class="col-md-6">
                  <div class="contact-form">
                     <div class="row">
                        <div class="col-md-12">
                           <h1>Contact</h1>
                        </div>
                     </div>
                     @if($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                     <form action="{{ route('save.details.guest') }}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter E-Mail id" name="email" value="{{ $customer->email ?? '' }}" autocomplete="tel">
                              </div>
                              <div class="mb-3 form-check custom-checkbox">
                                 <input type="checkbox" class="form-check-input " name="email_alert" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Email me with news and offers</label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="delivery-head">
                                 <h1>Delivery</h1>
                              </div>
                           </div>
                        </div>
                        <input type="hidden" name="store_id"  id="store_id" value="{{$storeId}}" required >
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <select class="form-select" name="country_id" id="country_id" aria-label="Default select example">
                                    @foreach($countries as $country)
                                    @if($storeId==$country->id)
                                    <option selected value="{{$country->id}}">{{$country->country_name}}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row ">
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="First Name " value="{{ $customer->first_name ?? '' }}" required >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <input type="text" name="last_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Last Name " value="{{ $customer->last_name ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Address" value="{{ $customer->address ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="text" name="apartment" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Apartment, Suite , etc. (optional )" value="{{ $customer->apartment ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="mb-3">
                                 <input type="text" name="city" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="City" value="{{ $customer->city ?? '' }}" required>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <select class="form-select" name="state_id" id="state_id" aria-label="Default select example" required>
                              <option>Select</option>
                              @foreach($states as $states)
                                 <option value="{{$states->id}}">{{$states->state_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-md-4">
                              <div class="mb-3">
                                 <input type="number" class="form-control" id="pincode" name="pincode" min="1" max="" placeholder="Pin Code" value="{{ $customer->pincode ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ $customer->phone ?? '' }}" required >
                              </div>
                              <div class="mb-3 form-check custom-checkbox">
                                 <input type="checkbox" class="form-check-input" name="save_next_time" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Save this information for next time</label>
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="delivery-head">
                                 <h1> Shipping</h1>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                            
                              <div class="mb-3">
                              <div class="form-floating-checkout">
                                          <textarea class="form-control" name="special_instructions" placeholder="Order Special Instructions." id="floatingTextarea"></textarea>
                                         
                                </div>
                              
                              </div>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="delivery-head">
                                 <h1> Shipping method</h1>
                                 <p>All transactions are secure and encrypted.</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              @if($storeId==1 || $storeId==4)
                              <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                                 <input type="checkbox" name="cash_on_delivery" class="form-check-input" id="exampleCheck1" checked>
                                 <label class="form-check-label"  for="exampleCheck1">Cash on Delivery (COD)</label>
                              </div>
                              @else
                              <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                                 <input type="checkbox" name="stripe" class="form-check-input" id="exampleCheck1" checked>
                                 <label class="form-check-label"  for="exampleCheck1">Stripe</label>
                              </div>
                              @endif
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="delivery-head">
                                 <h1> Billing address</h1>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="radio-one">
                                 <div class="form-check custom-radio">
                                    <input class="form-check-input" name="billing_option" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="toggleBillingForm()" value="same">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Same as shipping address
                                    </label>
                                 </div>
                              </div>
                              <div class="radio-one">
                                 <div class="form-check custom-radio">
                                    <input class="form-check-input" name="billing_option" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="toggleBillingForm()" value="different">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    Use a different billing address
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Hidden billing address form -->
                        <div class="row sub-form" id="billingForm" style="display: none; margin-top: 20px;">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="delivery-head">
                                    <h1>Billing Address</h1>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="mb-3">
                                    <select class="form-select" name="billing_country_id" id="billing_country_id" aria-label="Default select example">
                                       @foreach($countries as $country)
                                       @if($storeId==$country->id)
                                       <option selected value="{{$country->id}}">{{$country->country_name}}</option>
                                       @else
                                       <option  value="{{$country->id}}">{{$country->country_name}}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row ">
                              <div class="col-md-6">
                                 <div class="mb-3">
                                    <input type="text" name="billing_first_name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="First Name "   >
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="mb-3">
                                    <input type="text" name="billing_last_name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Last Name " >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="mb-3">
                                    <input type="text" name="billingAddress" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Address" >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="mb-3">
                                    <input type="text" name="billingPostalCode" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Pincode" >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="mb-3">
                                    <input type="text" name="billingCity" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="City" >
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <select class="form-select" name="billing_state" id="billing_state" aria-label="Default select example" >
                                 <option >Select</option>
                                 @foreach($billingStates as $state)
                                    <option value="{{$state->id}}">{{$state->state_name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <div class="mb-3">
                                    <input type="number" class="form-control" id="billing_post_code" name="billing_post_code" min="1" max="" placeholder="Pin Code" >
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- JavaScript -->
                        <script>
                           function toggleBillingForm() {
                               const billingForm = document.getElementById('billingForm');
                               const useDifferentBilling = document.getElementById('flexRadioDefault2');
                               
                               // Show or hide the billing form based on selected radio button
                               if (useDifferentBilling.checked) {
                                   billingForm.style.display = 'block';
                               } else {
                                   billingForm.style.display = 'none';
                               }
                           }
                        </script>
                        <div class="row">
                           <div class="col-md-12">
                              <button  type="submit"class="complete-order w-100">
                              Complete Order
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-6 checkout-detail" >
                  <div class="row">
                     <div class="col-md-12">
                        <div class="bag">
                           <div class="row">
                              <div class="col-md-12">
                                 <h1>BAG</h1>
                              </div>
                           </div>
                           <div class="row">
                              @foreach($cartItems as $item)
                              <div class="col-md-6">
                                 <div class="account-bag-img"><img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="account-bag-details">
                                    <h1>{{$item->name}}</h1>
                                    <div class="account-bag-ltr">
                                    </div>
                                    <div class="account-bag-price">
                                       <p>{{$item->attributes->currency}} {{$item->price}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                           <hr style="border: 1px solid rgba(255, 255, 255, 0.5)">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="account-quantity-main">
                                    <h1>Quantity :</h1>
                                    <h1>{{$cartItems->count()}}</h1>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="quantity-price">
                                    <h1>
                                       {{Cart::getTotal()}}
                                    </h1>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="quantity-price-details checkout-price-details">
                           <div class="row">
                              <div class="col-md-12">
                                 <h1 class="mb-3">Price Detail</h1>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="account-bag-mrp">
                                    <h1>Bag MRP ({{$cartItems->count()}} items)</h1>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="account-bag-mrp-price">
                                    <h1> {{$currency}} {{Cart::getTotal()}}</h1>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="account-bag-mrp">
                                    <h1>Shipping Charge</h1>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="account-bag-mrp-price-green">
                                    <h1 id="shippingCharge">+{{$totalShippingCharge}}</h1>
                                 </div>
                              </div>
                           </div>
                           @if($storeId==1)
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="account-price-details">
                                    <p>Shipping Charge Calculated After Enter shipping address</p>
                                 </div>
                              </div>
                              @endif
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="account-you-pay">
                                    <h1>You Pay </h1>
                                 </div>
                              </div>
                              <div class="col-md-6">
    <div class="account-pay-amount" style="display: flex; align-items: center; gap: 5px;">
        <h1 id="currency">{{$currency}}</h1>
        <h1 id="total_pay">{{Cart::getTotal() + $totalShippingCharge}}</h1>
    </div>
</div>
                           </div>
                           <hr style="border: 1px solid rgba(255, 255, 255, 0.5)">
                           <!-- <div class="row">
                              <div class="account-discount-rate">
                                 <p>You are saving ₹80</p>
                              </div>
                              </div> -->
                        </div>
                     </div>
                  </div>
               </div>
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
      </script>
      <script>
         $(document).ready(function () {
             $('#state_id').change(function () {
                 let stateId = $(this).val();
                 let storeId = $('#store_id').val();
                 let cartTotal = {{ Cart::getTotal() }};
                 $.ajax({
                     url: "{{ route('calculate.shipping.charge') }}",
                     type: 'post',
                     data: {
                         state_id: stateId,
                         store_id:storeId,
                          _token: "{{ csrf_token() }}"
                     },
                     success: function (response) {
                        let totalPayable = cartTotal + response.totalShippingCharge;
                         $('#shippingCharge').text('+' + response.totalShippingCharge);
                         $('#total_pay').text(totalPayable); // Update total pay
                         
                     },
                     error: function () {
                         alert('Error calculating shipping charge.');
                     }
                 });
             });
         });
         $(document).ready(function() {
         $('#billing_country_id').change(function() {
             var countryId = $(this).val();
             
             if(countryId) {
                 $.ajax({
                     url: "{{ route('get-states', ['countryId' => ':countryId']) }}".replace(':countryId', countryId),
                     type: 'GET',
                     success: function(response) {
                         // Clear the previous options
                         $('#billing_state').empty();
                         // Add a default "Select" option
                        
         
                         // Append the new states
                         $.each(response.states, function(key, state) {
                             $('#billing_state').append('<option value="'+ state.id +'">'+ state.state_name +'</option>');
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