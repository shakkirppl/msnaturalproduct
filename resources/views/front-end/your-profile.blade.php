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
      <!-- address start -->
      <section class="address-main">
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12 col-12">
                  <div class="adress-name">
                     <h1>{{ __('main.Welcome_Back') }},<span class="user-name">{{Auth::user()->name}}</span> </h1> 
                  </div>
               </div>
              
            </div>
            <div class="row">
               <div class=" col-sm-3 col-md-3 col-lg-2">
                  <div class="nav   order-button flex-column nav-pills  profile-padding " id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">
                        <div class="address-order-main">
                           <div class="address-img">
                              <img src="{{URL::to('/')}}/front-end/images/address/Rectangle 143.png" alt="">
                           </div>
                           <div class="address-order">
                              <h1>{{ __('main.Orders') }}</h1>
                              <p> {{ __('main.View_your_Orders') }}</p>
                           </div>
                        </div>
                     </button>
                     <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">
                        <div class="address-order-main">
                           <div class="address-img">
                              <img src="{{URL::to('/')}}/front-end/images/address/Rectangle 144.png" alt="">
                           </div>
                           <div class="address-order">
                              <h1>{{ __('main.Address') }}</h1>
                              <p>{{ __('main.manage_Address') }}</p>
                           </div>
                        </div>
                     </button>
                   
                  </div>
               </div>
               <div class="col-sm-9 col-md-9 col-lg-9">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        <!-- order start -->
                        @foreach ($orders as $order )
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <div class="your-order-details">
                                       <div class="table-main p-2" style=" background-color: #FDE7C1; background-color: #FDE7C1;
                                          border-radius: 10px 10px 0px 0px;">
                                          <div class="row" >
                                             <div class="col-md-12 ">
                                                <table class="table overflow-x: auto">
                                                   <thead>
                                                      <tr>
                                                         <th class="table-head"
                                                            style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            {{ __('main.Order_placed') }}
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            {{ __('main.TOTAL') }}
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            {{ __('main.SHIP_TO') }}
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col" colspan="2">
                                                            {{ __('main.ORDER') }} {{$order->order_no}}
                                                         </th>
                                                      </tr>
                                                      <tr>
                                                         <th scope="row"
                                                            style=" background-color: #FDE7C1;">
                                                            {{$order->date}}
                                                         </th>
                                                         <td style=" background-color: #FDE7C1;">
                                                            {{$order->currecncy}} {{$order->total_amount}}
                                                         </td>
                                                         <td style=" background-color: #FDE7C1;">
                                                            <div class="dropdown-container-order">
                                                               <div class="dropdown-box-order"
                                                                  style="color:#14564F;">
                                                                  {{$order->billing_first_name}} {{$order->billing_second_name}}
                                                               </div>
                                                               <div class="dropdown-content-order">
                                                                  <p>{{$order->billing_address}}</p>
                                                                  <p>{{$order->billing_city}},{{$order->billing_post_code}}</p>
                                                                  <p> {{$order->billing_phone}}</p>
                                                               </div>
                                                            </div>
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            {{ __('main.VIEW_ORDER_DETAILS') }}
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            {{ __('main.INVOICE') }}
                                                         </td>
                                                   </thead>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                
                                       <div class="order-product-div">
                                          @foreach ($order->orderdetails as $detail)
                                          <div class="row mb-3">
                                             <div class="col-md-8">
                                                <!-- product start -->
                                                <div class="row mb-2">
                                                   <div class="col-md-2 col-3">
                                                      <div class="order-detail-img">
                                                         <img src="{{ url('uploads/products/' . $detail->product->image) }}"
                                                            alt="">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-10 col-9">
                                                      <div class="order-product-details">
                                                         <div class="head-one">
                                                            <h1>{{$detail->product->product_name}}</h1>
                                                         </div>
                                                         <div class="head-two">
                                                            <h1>{{$detail->currency}} {{$detail->price}}</h1>
                                                         </div>
                                                         <div class="head-three">
                                                            <h1>{{$detail->quantity}} {{ __('main.Piece') }}</h1>
                                                         </div>
                                                      </div>
                                                      <div class="order-product-details-price">
                                                         <div class="price-one">
                                                            <h1>{{$detail->currency}} {{$detail->price}}</h1>
                                                         </div>
                                                         <div class="price-two">
                                                            <h1>{{$detail->currency}} {{$detail->price}}</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- product end -->
                                             </div>
                                             <div class="col-md-4">
                                                <div class="order-buttons">
                                                   <!-- <div class="return-item-main">
                                                      <button class="return-item-button">Return
                                                          Item</button>
                                                      </div> -->
                                                   <a href="{{url('product-review/'.$detail->product_id)}}">
                                                      <div class="write-product-main">
                                                         <button class="write-product-button"> {{ __('main.Write_Product_Review') }}</button>
                                                      </div>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                          @endforeach
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="horizonatl-line-address">
                                                <hr>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="order-submission">
                                          <div class="row">
                                             <div class="col-md-8 col-12">
                                                <h1 class="return-head"> {{ __('main.Cancel_eligible_Only_Before_Shipping') }}
                                                </h1>
                                             </div>
                                             <div class="col-md-4 col-12">
                                                @if($order->delivery_status=='Delivered')
                                                <a href="{{url('re-order/'.$order->id)}}">
                                                   <div class="col-md-12">
                                                      <button class="reorder-button">{{ __('main.Reorder') }}</button>
                                                   </div>
                                                </a>
                                                @endif
                                                @if($order->delivery_status=='Pending')
                                                <a href="{{url('cancel-order/'.$order->id)}}" onclick="return confirmCancel(event, this.href)">
                                                   <div class="col-md-12">
                                                      <div class="cancel-order-main">
                                                         <button class="cancel-order">{{ __('main.Cancel_Order') }}</button>
                                                      </div>
                                                   </div>
                                                </a>
                                                @else
                                                <div class="col-md-12">
                                                   <div class="cancel-order-main">
                                                      <label  class="reorder" style="color:red;">{{ __('main.Canceled') }}</label>
                                                   </div>
                                                </div>
                                                @endif
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
                     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <!-- address start -->
                                    <div class="row">
                                       <div class="col-md-5 ">
                                          <a style="color:#56595F;" href="{{url('address.new')}}">
                                             <div class="address-box">
                                                <span class="plus-sign">+</span>
                                                <div class="add-address">{{ __('main.Add_Address') }}</div>
                                             </div>
                                          </a>
                                       </div>
                                       @foreach($customerAddress as $address)
                                       <div class="col-md-5">
                                          <a style="color:#56595F;" href="">
                                             <div class="address-box-default">
                                                @if($address->deafult==1)
                                                <h1>{{ __('main.Default') }}:</h1>
                                                @endif
                                                <hr style="margin: 0px;">
                                                <div class="address-default">
                                                   <p class="name">{{$address->first_name}} {{$address->last_name}}</p>
                                                   <p>{{$address->address}}</p>
                                                   <p>{{$address->landmark}}</p>
                                                   <p>{{$address->city}}, @foreach($address->states as $state)  {{$state->name}}  @endforeach,{{$address->pincode}}</p>
                                                   <p>@foreach($address->countrys as $country)  {{$country->country_name}}  @endforeach</p>
                                                   <P>Phone Number:{{$address->phone_number}}</P>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <div class="address-list-button"> 
                                          <a href="{{ url('address.edit', $address->id) }}"><button>{{ __('main.Edit') }}</button></a><span>|</span>
                                          <a href="{{ url('address.remove', $address->id) }}"><button>{{ __('main.Remove') }}</button></a>
                                          @if($address->deafult==0)
                                          <a href="{{ url('address.set.default', $address->id) }}"><button>{{ __('main.Set_as_Default') }}</button></a>
                                          @endif
                                          </div>
                                          </div>
                                          </div>
                                          </div>
                                          </a>
                                       </div>
                                       @endforeach
                                    </div>
                                    <!-- address end -->
                                 </div>
                              </div>
                           </div>
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
         // Select all dropdown boxes
         document.querySelectorAll('.dropdown-box-order').forEach(function (dropdownBox) {
             dropdownBox.addEventListener('click', function (event) {
                 const dropdown = this.parentElement;
                 dropdown.classList.toggle('active');
         
                 // Prevent event bubbling to document
                 event.stopPropagation();
             });
         });
         
         // Close all dropdowns if clicked outside
         document.addEventListener('click', function () {
             document.querySelectorAll('.dropdown-container-order').forEach(function (dropdown) {
                 dropdown.classList.remove('active');
             });
         });
      </script>
   </body>
</html>