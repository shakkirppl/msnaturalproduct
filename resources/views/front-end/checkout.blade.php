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
            <div class="row">
               <div class="col-md-12">
                  <div class="guest-address-main">
                     <div class="row">
                        <div class="cart-details">
                           <h1>My Cart({{$cartItems->count()}})</h1>
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
                                    <h1>{{$item->quantity}} Piece</h1>
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
                                    <button class="remove-button">Remove</button>
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
                                 <h1>Sub Total</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p> {{$currency}} {{$originalPrice}}</p>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>Sub Total</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{Cart::getTotal()}}</p>
                              </div>
                           </div>
                           </div> -->
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1>Big Discount</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p>{{$currency}} {{$originalPrice-$offerPrice}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="cart-details-payment-head-list">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-head">
                                 <h1 style="font-weight: 600;">Total Payble</h1>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-details-payment-price">
                                 <p style="font-weight: 600;">{{$currency}} {{Cart::getTotal()}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <section>
         <div class="product-main-div">
            <div class="form-checkout-form">
               <div class="row">
                  <div class="col-md-12">
                     @if($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                     <form class="form-sub" action="{{ route('save.details.guest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="store_id"  id="store_id" value="{{$storeId}}" required >
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Country/Region</label><br>
                                 <select class="form-select form-select-ms" name="country_id" id="country_id" aria-label="Default select example">
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
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">First Name</label>
                                 <input type="text" name="first_name" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->first_name ?? '' }}" required>
                              </div>
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Last Name</label>
                                 <input type="text" name="last_name" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->last_name ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label"> Address</label>
                                 <input type="text" name="address" class="form-control  form-control-ms" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Address" value="{{ $customer->address ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label"> Mobile number</label>
                                 <input type="number" name="phone" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->phone ?? '' }}" required>
                                 <label for="">May be used to assist delivery</label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Pincode</label>
                                 <input type="number" class="form-control form-control-ms" name="pincode" value="{{ $customer->pincode ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Flat, House no., Building, Company, Apartment</label>
                                 <input type="text" name="apartment" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->apartment ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Area, Street, Sector, Villaget</label>
                                 <input type="text" name="address" class="form-control  form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->address ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Landmark</label>
                                 <input type="text" name="landmark" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->landmark ?? '' }}" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 pe-2">
                              <div class="mb-3">
                                 <label for="" class="form-ms-label">Town/City</label>
                                 <input type="text" name="city" class="form-control form-control-ms" id=""
                                    aria-describedby="emailHelp" value="{{ $customer->city ?? '' }}" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label for="" class="form-ms-label">State</label>
                              <select class="form-select  form-control-ms" name="state_id" id="state_id" aria-label="Default select example" required>
                                 <option>Select</option>
                                 @foreach($states as $states)
                                 <option value="{{$states->id}}">{{$states->state_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row mt-3">
                                 <div class="col-md-12">
                                    <div class="delivery-head">
                                       <h1 class="shipping-name"> Shipping method</h1>
                                       <p>All transactions are secure and encrypted.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                                       <input type="checkbox" name="cash_on_delivery" class="form-check-input"
                                          id="exampleCheck1" checked>
                                       <label class="form-check-label" for="exampleCheck1">Cash on Delivery (COD)</label>
                                    </div>


                                  
                                    <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                                       <input type="checkbox" name="stripe" class="form-check-input" id="exampleCheck1"
                                          >
                                       <label class="form-check-label" for="exampleCheck1">Stripe</label>
                                    </div>
                                 
                                    <!-- @if($storeId != 1 && $storeId != 4)
                                    <div class="mb-3 form-check  custom-checkbox-cash-on-delivery">
                                       <input type="checkbox" name="stripe" class="form-check-input" id="exampleCheck1"
                                          checked>
                                       <label class="form-check-label" for="exampleCheck1">Stripe</label>
                                    </div>
                                    @endif -->

                                 </div>
                              </div>
                              <div class="row mt-4">
                                 <div class="col-md-12">
                                    <div class="delivery-head">
                                       <h1 class="shipping-name"> Billing address</h1>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="radio-one">
                                       <div class="form-check custom-radio">
                                          <input class="form-check-input  "  name="billing_option" type="radio"
                                             name="flexRadioDefault" id="flexRadioDefault1" checked
                                             onclick="toggleBillingForm()" value="same">
                                          <label class="form-check-label" for="flexRadioDefault1">
                                          Same as shipping address
                                          </label>
                                       </div>
                                    </div>
                                    <div class="radio-one">
                                       <div class="form-check custom-radio">
                                          <input class="form-check-input" name="billing_option" type="radio"
                                             name="flexRadioDefault" id="flexRadioDefault2" onclick="toggleBillingForm()"
                                             value="different">
                                          <label class="form-check-label" for="flexRadioDefault2">
                                          Use a different billing address
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Hidden billing address form -->
                              <div class="sub-form">
                                 <div class="row " id="billingForm" style="display: none; margin-top: 20px;">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="delivery-head">
                                             <h1 class="shipping-name billing-address-">Billing Address</h1>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">Town/City</label>
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
                                             <label for="" class="form-ms-label">First Name</label>
                                             <input type="text" name="billing_first_name" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                >
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">Last Name</label>
                                             <input type="text" name="billing_last_name" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Last Name ">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">Address</label> 
                                             <input type="text" name="billing_address" class="form-control form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">Pincode</label> 
                                             <input type="number" name="billing_postcode" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pincode" >
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">City</label> 
                                             <input type="text" name="billing_city" class="form-control  form-control-ms"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="city" >
                                          </div>
                                       </div>
                                       <div class="col-md-4  pe-2 ps-2">
                                          <label for="" class="form-ms-label">State</label> 
                                          <select class="form-select  form-control-ms" name="billing_state" id="billing_state" aria-label="Default select example" >
                                             <option >Select</option>
                                             @foreach($billingStates as $state)
                                             <option value="{{$state->id}}">{{$state->state_name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="mb-3">
                                             <label for="" class="form-ms-label">Pincode</label> 
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
                              COMPLETE ORDER
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12">
                  <div class="sub-buttons" >
                     <div class="">
                        <div class="row">
                           <div class="cart-details">
                              <h1>BAG</h1>
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
                                       <h1>{{$item->attributes->currency}} {{$item->price}}</h1>
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
                                    <h1>Quantity : <span>{{$cartItems->count()}}</span></h1>
                                 </div>
                              </div>
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-price">
                                    <p> {{Cart::getTotal()}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-head">
                                    <h1>Price Detail</h1>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-head">
                                    <h1>Bag MRP ({{$cartItems->count()}} items)</h1>
                                 </div>
                              </div>
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-price">
                                    <p>{{$currency}} {{Cart::getTotal()}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-head">
                                    <h1>Shipping Charge</h1>
                                 </div>
                              </div>
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-price">
                                    <p>+{{$totalShippingCharge}}</p>
                                 </div>
                              </div>
                           </div>
                           @if($storeId==1)
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="account-price-details">
                                    <p class="shipping-notice">Shipping Charge Calculated After Enter shipping address</p>
                                 </div>
                              </div>
                              @endif
                           </div>
                        </div>
                        <hr>
                        <div class="cart-details-payment-head-list">
                           <div class="row">
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-head">
                                    <h1 style="font-weight: 600;">You Pay</h1>
                                 </div>
                              </div>
                              <div class="col-md-6 col-6">
                                 <div class="cart-details-payment-price  cart-checkout-totalpay d-flex ">
                                    <h1 id="currency">{{$currency}}</h1>
                                    <h1 id="total_pay">{{Cart::getTotal() + $totalShippingCharge}}</h1>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                     </div>
                     <!-- <div class="row">
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
                              
                           </div>
                        </div>
                        </div> -->
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
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/jquery.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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