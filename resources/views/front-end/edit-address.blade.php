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
      <!-- address start -->
      <section class="address-main">
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-12 col-12">
                  <div class="adress-name">
                     <h1>{{ __('main.Welcome_Back') }},<span class="user-name">{{Auth::user()->name}}</span> </h1>
                  </div>
               </div>
               <!-- <div class="col-md-6 col-6">
                  <form action="{{ route('sign-out') }}" method="POST" style="display: inline;">
                     @csrf
                     <button type="submit"  style="border: none; background: none; padding: 0; width: 100%; text-align: left;">
                        <div class="logout">
                           <h1>Logout</h1>
                        </div>
                     </button>
                  </form>
               </div> -->
            </div>
            <div class="row">
               <div class="col-sm-3 col-md-3 col-lg-2">
                  <div class="nav   order-button flex-column nav-pills " id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     
                     <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="true">
                        <div class="address-order-main">
                           <div class="address-img">
                              <img src="images/address/Rectangle 144.png" alt="">
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
                    




                     <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                  
                                    <form class="form-sub" action="{{ url('update.shipping-address') }}" method="POST">
                                    
                                       
                                    @csrf
                                        <div class="row">
                                           <div class="col-md-12">
                                              <div class="mb-3">
                                             <label for="" class="form-ms-label">{{ __('main.Country_Region') }}</label><br>
                                             <select class="form-select form-select-ms" name="country_id" id="country_id" aria-label="Default select example">
                                                   @foreach($countries as $country)
                                                   <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                   @endforeach
                                                </select>
                                            
                                              </div>
                                           </div>
                                        </div>
                                        <div class="row ">
                                           <div class="col-md-12">
                                              <div class="mb-3"> 
                                                 <label for="" class="form-ms-label">{{ __('main.First_Name') }}</label>

                                                 <input type="text" name="first_name" class="form-control form-control-ms" id=""
                                                    aria-describedby="emailHelp" value="{{$customerAddress->first_name}}" required >

                                              </div>
                                           </div>
                                           
                                        </div>
                                        <div class="row">
                                           <div class="col-md-12">
                                              <div class="mb-3">
                                                
                                                    <label for="" class="form-ms-label">{{ __('main.Last_Name') }}</label>
                                                 <input type="text" name="last_name" class="form-control  form-control-ms" id=""
                                                    aria-describedby="emailHelp"  value="{{$customerAddress->last_name}}" required>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-ms-label">{{ __('main.Mobile_number') }} </label>
                                                   <input type="number" name="phone_number" class="form-control form-control-ms" id=""
                                                      aria-describedby="emailHelp"  value="{{$customerAddress->phone_number}}" required>
                                                      <label for="">May be used to assist delivery</label>
                                                </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3"> 
                                                     <label for="" class="form-ms-label">{{ __('main.Pincode') }}</label>

                                                    <input type="number" class="form-control form-control-ms" name="pincode"  value="{{$customerAddress->pincode}}" required >
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-md-12">
                                              <div class="mb-3">
                                                <label for="" class="form-ms-label">{{ __('main.Address') }}</label>
                                                 <input type="text" name="address" class="form-control form-control-ms" id=""
                                                    aria-describedby="emailHelp"  value="{{$customerAddress->address}}" required>
                                              </div>
                                           </div>
                                        </div>
                                      
                                        <div class="row">
                                           <div class="col-md-12">
                                              <div class="mb-3">
                                                <label for=""  class="form-ms-label">{{ __('main.Landmark') }}</label>
                                                 <input type="text" name="landmark" class="form-control form-control-ms" id=""
                                                    aria-describedby="emailHelp"  value="{{$customerAddress->landmark}}" required>
                                              </div>
                                           </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pe-2">
                                                <div class="mb-3">
                                                    <label for=""  class="form-ms-label">{{ __('main.Town_City') }}</label>
                                                     <input type="text" name="city" class="form-control form-control-ms" id=""
                                                        aria-describedby="emailHelp"  value="{{$customerAddress->city}}" required>
                                                  </div>
                                             </div>
                                            <div class="col-md-6">
                                                <label for=""  class="form-ms-label">{{ __('main.State') }}</label>
                                                <select class="form-select form-control-ms" name="state_id" id="state_id" aria-label="Default select example" required>
                                                <option>Select</option>
                                                @foreach($billingStates as $states)
                                                <option value="{{$states->id}}">{{$states->state_name}}</option>
                                                @endforeach
                                             </select>
                                           
                                         </div>
                                        
                                        
                                        </div>
                                       
                                      
                                 
                                    
                                        <div class="row">
                                           <div class="col-md-12">
                                              <button  type="submit"class="complete-order">
                                              {{ __('main.UPDATE_ADDRESS') }} 
                                              </button>
                                           </div>
                                        </div>
                                     </form>
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