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
                     <div class="row">
                        <div class="cart-details">
                           <h1>{{ __('main.My_Cart') }} ({{$cartItems->count()}})</h1>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-detail-main-padding">
                        @foreach($cartItems as $item)
                        <div class="row mb-2">
                           <div class="col-md-2 col-3">
                              <div class="cart-detail-img">
                                 <img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
                              </div>
                           </div>
                           <div class="col-md-10 col-9">
                              <div class="cart-product-details">
                                 <div class="cart-head-one">
                                    <h1>{{$item->name}}</h1>
                                 </div>
                                 <div class="cart-head-three">
                                    <h1>{{$item->quantity}} {{ __('main.Piece') }}</h1>
                                 </div>
                              </div>
                              <div class="cart-order-product-details-price">
                                 <div class="cart-price-one">
                                    <h1>{{$item->attributes->currency}} {{$item->price}}</h1>
                                 </div>
                                 <div class="cart-price-two">
                                    <h1>{{$item->attributes->currency}} {{$item->attributes->original_price}}</h1>
                                 </div>
                                 <div class="cart-remove-button">
                                    <button class="remove-button">{{ __('main.Remove') }}</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>{{ __('main.Sub_Total') }}</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$originalPrice}}</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>{{ __('main.Big_Discount') }}</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$originalPrice-$offerPrice}}</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>{{ __('main.Shipping_Charge') }}</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$totalShippingCharge}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1 style="font-weight: 600;">{{ __('main.Total_Payble') }}</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p style="font-weight: 600;">{{$currency}} {{Cart::getTotal()+$totalShippingCharge}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="product-main-div">
         <form action="{{ route('save.details') }}" method="POST">
            <!-- Display custom cart validation error -->
    @if ($errors->has('cart'))
        <div class="text-danger">
            {{ $errors->first('cart') }}
        </div>
    @endif
            @csrf
            <div class="row">
            <div class="col-md-12">
               <div class="user-account-main">
                  <div class="row mt-3">
                     <div class="col-md-12">
                        <div class="delivery-head">
                           <h1 class="shipping-name">{{ __('main.Shipping_method') }} </h1>
                           <p>{{ __('main.All_transactions') }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                           <input type="checkbox" name="cash_on_delivery" class="form-check-input"
                              id="exampleCheck1" checked>
                           <label class="form-check-label" for="exampleCheck1">{{ __('main.Cash_on_Delivery') }}</label>
                        </div>
                        <!-- <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                           <input type="checkbox" name="stripe" class="form-check-input" id="exampleCheck1"
                              >
                           <label class="form-check-label" for="exampleCheck1">Stripe</label>
                        </div> -->
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="delivery-head">
                                 <h1 class="shipping-name billing-address-">{{ __('main.Billing_Address') }}</h1>
                              </div>
                           </div>
                        </div>
                        <div class="radio-group">
                           @if(!empty($customerAddress) && count($customerAddress) > 0)
                           @foreach($customerAddress as $address)
                           <label class="address-label">
                              <span class="address-details">
                                 <p class="name">{{$address->first_name}} {{$address->last_name}}</p>
                                 <p class="address">
                                    {{$address->address}}, {{$address->landmark}}, {{$address->city}},
                                    @foreach($address->states as $state) {{$state->name}} @endforeach,
                                    {{$address->pincode}}, {{$address->phone_number}}
                                 </p>
                              </span>
                              <input type="radio" name="address" id="address{{$address->id}}" value="{{$address->id}}" 
                              {{$address->deafult == 1 ? 'checked' : ''}}>
                           </label>
                           @endforeach
                           @endif
                           <!-- <label>
                              <input class="form-check-input" name="billing_option" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="toggleBillingForm()" value="same" >
                              </label> -->
                        </div>
                        <div class="row">
                           <div class="col-md-12 text-end">
                              <a href="{{ url('address.new') }}">
                              <button type="button" class="user-account-plus">
                              <span class="plus-sign-checkout">+</span>
                              <br>
                              <span class="plus-sign-address">{{ __('main.Add_Address') }}</span>
                              </button>
                              </a>
                           </div>
                           @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="radio-one">
                                 <div class="form-check custom-radio">
                                    <input class="form-check-input" name="billing_option" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="toggleBillingForm()" value="same">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    {{ __('main.Same_as_shipping_address') }}
                                    </label>
                                 </div>
                              </div>
                              <div class="radio-one">
                                 <div class="form-check custom-radio">
                                    <input class="form-check-input" name="billing_option" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="toggleBillingForm()" value="different">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                    {{ __('main.Use_a_different_billing_address') }}
                                    </label>
                                 </div>
                              </div>
                              @error('billing_option')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                              <!-- Hidden billing address form -->
                              <div class="sub-form">
                                 <div class="row " id="billingForm" style="display: none; margin-top: 20px;">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="delivery-head">
                                             <h1 class="shipping-name billing-address-">{{ __('main.Billing_Address') }}</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Town_City') }}</label>
                                             <select class="form-select  form-control-ms" name="billing_country_id" id="billing_country_id" aria-label="Default select example">
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
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.First_name') }}</label>
                                             <input type="text" name="billing_first_name" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                >
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Last_name') }}</label>
                                             <input type="text" name="billing_last_name" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Last Name ">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Address') }}</label> 
                                             <input type="text" name="billing_address" class="form-control form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                          <label for="" class="form-ms-label">{{ __('main.Mobile_number') }}</label>
                                             <input type="number" name="billing_phone" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobile Number" >
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Town_City') }}</label> 
                                             <input type="text" name="billing_city" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="city" >
                                          </div>
                                       </div>
                                       <div class="col-md-4  pe-2 ps-2">
                                          <label for="" class="form-ms-label">{{ __('main.State') }}</label> 
                                          <select class="form-select  form-control-ms" name="billing_state" id="billing_state" aria-label="Default select example" >
                                             <option >Select</option>
                                             @foreach($billingStates as $state)
                                             <option value="{{$state->id}}">{{$state->state_name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Pincode') }}</label> 
                                             <input type="number" class="form-control form-control-ms" id="billing_post_code"
                                                name="billing_post_code" min="1" max="" >
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <button type="submit" class=" checkout-add-address">
                              {{ __('main.COMPLETE_ORDER') }} 
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </form>
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
      <script>
         document.querySelectorAll('.radio-group input[type="radio"]').forEach(radio => {
         radio.addEventListener('change', () => {
         console.log(`Selected value: ${radio.value}`);
         });
         });
         
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