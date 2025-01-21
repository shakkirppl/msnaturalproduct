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
      <div class="row">
         <div class="showcase">
            <div class="showcase-wrapper">
               <div class="announcement-bar">
                  <div class="announcement-content">
                     <!-- <div class="back-arrow" tabindex="0">&lt;</div> -->
                     <div class="announcement-text">
                        www.msnaturalproducts.com Now Changed to
                        <span class="highlight">www.msnaturalproduct.com</span>
                     </div>
                     <!-- <div class="back-arrow" tabindex="0">&lt;</div> -->
                  </div>
               </div>
               <header class="header">
                  <div class="header-top">
                     <div class="language-selector">
                        <button class="lang-btn" type="button">ENG</button>
                        <div class="dropdown">
                           <button class="country-btn" type="button">INDIA</button>
                           <ul class="dropdown-menu">
                              <li><a href="#" data-country="USA">USA</a></li>
                              <li><a href="#" data-country="UK">UK</a></li>
                              <li><a href="#" data-country="Canada">Canada</a></li>
                              <li><a href="#" data-country="Australia">Australia</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="logo-wrapper">
                        <a href="/"> <img src="images/header/Logo.png" alt="Company Logo" class="logo" /></a>
                     </div>
                     <div class="social-icons">
                        <img src="images/header/profile.png" alt="Social Media Icon" class="social-icon" />
                        <div class="cart-container">
                           <img style="position: relative;" src="images/header/cart.png" alt="Cart Icon"
                              class="social-icon" id="cart-icon" />
                           <span class="cart-no">2</span>
                           <!-- Sliding Box -->
                           <div class="cart-box" id="cart-box">
                              <div class="top-cart-box"></div>
                              <div class="cart-box-head">
                                 <div>
                                    <h1>Cart</h1>
                                 </div>
                                 <div> <button class="close-btn-cart-box"
                                    id="close-btn-cart-box">&times;</button></div>
                              </div>
                              <div class="row p-3">
                                 <div class="col-md-4">
                                    <div class="cart-box-img">
                                       <img src="images/product-detail/Rectangle 131.png" alt="">
                                    </div>
                                 </div>
                                 <div class="col-md-8 p-3">
                                    <div class="cart-box-contents">
                                       <h1>Hair Care Oil</h1>
                                       <h2>250 ml <span>1 Piece</span></h2>
                                       <p>₹550</p>
                                       <div class="cart-box-count">
                                          <!-- <div class="quantity-selector" role="spinbutton" tabindex="0" aria-label="Select quantity">
                                             <button class="quantity-btn decrement" aria-label="Decrement quantity">-</button>
                                             <span class="quantity-count" aria-live="polite">1</span>
                                             <button class="quantity-btn increment" aria-label="Increment quantity">+</button>
                                             </div> -->
                                          <div class="remove">
                                             <button class="remove">Remove</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="cart-box-bottom">
                                 <div class="sub-total">
                                    <h1>Sub Total</h1>
                                 </div>
                                 <div class="sub-total-amount">
                                    <h1>₹550</h1>
                                 </div>
                              </div>
                              <div class="cart-box-bottom">
                                 <div class="sub-total">
                                    <h1>Total Payble</h1>
                                 </div>
                                 <div class="sub-total-amount">
                                    <h1>₹550</h1>
                                 </div>
                              </div>
                              <div class="cart-box-bottom">
                                 <p style="margin-bottom: 0px;">Shipping, Taxes, and Discounts Will be calculated
                                    at the checkout
                                 </p>
                              </div>
                              <div class="p-3"> <a href="view-cart.html"><button class="check-out">Check
                                 Out</button></a>
                              </div>
                           </div>
                        </div>
                        <img src="images/header/menu.png" alt="Social Media Icon" class="social-icon" />
                     </div>
                  </div>
                  <!-- Sliding Box -->
                  <nav class="nav-menu">
                     <a href="#" class="nav-link active">HOME</a>
                     <a href="#" class="nav-link">HAIR</a>
                     <a href="#" class="nav-link">SKIN</a>
                     <a href="#" class="nav-link">FACE</a>
                     <a href="#" class="nav-link ">NEW LAUNCH</a>
                     <a href="#" class="nav-link ">ABOUT US</a>
                     <a href="#" class="nav-link">BLOG</a>
                  </nav>
               </header>
            </div>
         </div>
      </div>
      <!-- header close -->
      <!-- address start -->
      <section class="address-main">
         <div class="product-main-div">
            <div class="row">
               <div class="col-md-6">
                  <div class="adress-name">
                     <h1>Welcome Back,<span class="user-name">User Name</span> </h1>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="logout">
                     <h1>Logout</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <div class="nav   order-button flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="false">
                        <div class="address-order-main">
                           <div class="address-img">
                              <img src="images/address/Rectangle 143.png" alt="">
                           </div>
                           <div class="address-order">
                              <h1>Orders</h1>
                              <p> View your Orders</p>
                           </div>
                        </div>
                     </button>
                     <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="true">
                        <div class="address-order-main">
                           <div class="address-img">
                              <img src="images/address/Rectangle 144.png" alt="">
                           </div>
                           <div class="address-order">
                              <h1>Address</h1>
                              <p>manage Address</p>
                           </div>
                        </div>
                     </button>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane " id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <div class="your-order-details">
                                       <div class="table-main p-3" style=" background-color: #FDE7C1; background-color: #FDE7C1;
                                          border-radius: 10px 10px 0px 0px;">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                         <th class="table-head"
                                                            style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            Order placed
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            TOTAL
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            SHIP
                                                            TO
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col" colspan="2">
                                                            ORDER
                                                         </th>
                                                      </tr>
                                                      <tr>
                                                         <th scope="row"
                                                            style=" background-color: #FDE7C1;">
                                                            20
                                                            OCTOBER 2024
                                                         </th>
                                                         <td style=" background-color: #FDE7C1;">
                                                            ₹519.00
                                                         </td>
                                                         <td style=" background-color: #FDE7C1;">
                                                            <div class="dropdown-container-order">
                                                               <div class="dropdown-box-order"
                                                                  style="color:#14564F;">
                                                                  MAHAMOOD KHAN N M
                                                               </div>
                                                               <div class="dropdown-content-order">
                                                                  <p></p>
                                                                  <p></p>
                                                                  <p> </p>
                                                               </div>
                                                            </div>
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            VIEW ORDER DETAILS
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            INVOICE
                                                         </td>
                                                   </thead>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="delivered-date">
                                                <h1>Delivered On Date <span> .../.../....</span>
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="order-product-div">
                                          <div class="row mb-3">
                                             <div class="col-md-8">
                                                <div class="row mb-2">
                                                   <div class="col-md-2">
                                                      <div class="order-detail-img">
                                                         <img src="images/product-detail/Rectangle 131.png"
                                                            alt="">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-10">
                                                      <div class="order-product-details">
                                                         <div class="head-one">
                                                            <h1>Hair Care Oil</h1>
                                                         </div>
                                                         <div class="head-two">
                                                            <h1>250 ml</h1>
                                                         </div>
                                                         <div class="head-three">
                                                            <h1>1 Piece</h1>
                                                         </div>
                                                      </div>
                                                      <div class="order-product-details-price">
                                                         <div class="price-one">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                         <div class="price-two">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mb-2">
                                                   <div class="col-md-2">
                                                      <div class="order-detail-img">
                                                         <img src="images/product-detail/Rectangle 131.png"
                                                            alt="">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-10">
                                                      <div class="order-product-details">
                                                         <div class="head-one">
                                                            <h1>Hair Care Oil</h1>
                                                         </div>
                                                         <div class="head-two">
                                                            <h1>250 ml</h1>
                                                         </div>
                                                         <div class="head-three">
                                                            <h1>1 Piece</h1>
                                                         </div>
                                                      </div>
                                                      <div class="order-product-details-price">
                                                         <div class="price-one">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                         <div class="price-two">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="order-buttons">
                                                   <div class="return-item-main">
                                                      <button class="return-item-button">Return
                                                      Item</button>
                                                   </div>
                                                   <div class="write-product-main">
                                                      <button class="write-product-button"> Write Product
                                                      Review</button>
                                                   </div>
                                                   <div class="reorder-main">
                                                      <button class="reorder-button">Reorder</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
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
                                             <div class="col-md-8">
                                                <h1 class="return-head"> Return eligible Only Before
                                                   Shipping
                                                </h1>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="cancel-order-main">
                                                   <button class="cancel-order">Cancel Order</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="order-main ">
                           <div class="row order-main ">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <div class="your-order-details">
                                       <div class="table-main p-3"
                                          style=" background-color: #FDE7C1; border-radius: 10px;">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                         <th class="table-head"
                                                            style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            Order placed
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            TOTAL
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col">
                                                            SHIP
                                                            TO
                                                         </th>
                                                         <th style=" background-color: #FDE7C1;"
                                                            scope="col" colspan="2">
                                                            ORDER
                                                         </th>
                                                      </tr>
                                                      <tr>
                                                         <th scope="row"
                                                            style=" background-color: #FDE7C1;">
                                                            20
                                                            OCTOBER 2024
                                                         </th>
                                                         <td style=" background-color: #FDE7C1;">
                                                            ₹519.00
                                                         </td>
                                                         <td style=" background-color: #FDE7C1;">
                                                            <div class="dropdown-container-order">
                                                               <div class="dropdown-box-order"
                                                                  style="color:#14564F;">
                                                                  MAHAMOOD KHAN N M
                                                               </div>
                                                               <div class="dropdown-content-order">
                                                                  <p></p>
                                                                  <p></p>
                                                                  <p> </p>
                                                               </div>
                                                            </div>
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            VIEW ORDER DETAILS
                                                         </td>
                                                         <td
                                                            style=" background-color: #FDE7C1;color:#14564F;">
                                                            INVOICE
                                                         </td>
                                                   </thead>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="delivered-date">
                                                <h1>Delivered On Date <span> .../.../....</span>
                                                </h1>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="order-product-div">
                                          <div class="row mb-3">
                                             <div class="col-md-8">
                                                <div class="row mb-2">
                                                   <div class="col-md-2">
                                                      <div class="order-detail-img">
                                                         <img src="images/product-detail/Rectangle 131.png"
                                                            alt="">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-10">
                                                      <div class="order-product-details">
                                                         <div class="head-one">
                                                            <h1>Hair Care Oil</h1>
                                                         </div>
                                                         <div class="head-two">
                                                            <h1>250 ml</h1>
                                                         </div>
                                                         <div class="head-three">
                                                            <h1>1 Piece</h1>
                                                         </div>
                                                      </div>
                                                      <div class="order-product-details-price">
                                                         <div class="price-one">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                         <div class="price-two">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mb-2">
                                                   <div class="col-md-2">
                                                      <div class="order-detail-img">
                                                         <img src="images/product-detail/Rectangle 131.png"
                                                            alt="">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-10">
                                                      <div class="order-product-details">
                                                         <div class="head-one">
                                                            <h1>Hair Care Oil</h1>
                                                         </div>
                                                         <div class="head-two">
                                                            <h1>250 ml</h1>
                                                         </div>
                                                         <div class="head-three">
                                                            <h1>1 Piece</h1>
                                                         </div>
                                                      </div>
                                                      <div class="order-product-details-price">
                                                         <div class="price-one">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                         <div class="price-two">
                                                            <h1>₹ 509</h1>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="order-buttons">
                                                   <div class="return-item-main">
                                                      <button class="return-item-button">Return
                                                      Item</button>
                                                   </div>
                                                   <div class="write-product-main">
                                                      <button class="write-product-button"> Write Product
                                                      Review</button>
                                                   </div>
                                                   <div class="reorder-main">
                                                      <button class="reorder-button">Reorder</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
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
                                             <div class="col-md-8">
                                                <h1 class="return-head"> Return eligible Only Before
                                                   Shipping
                                                </h1>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="cancel-order-main">
                                                   <button class="cancel-order">Cancel Order</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <form class="form-sub" action="" method="POST">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label for="" class="form-ms-label">Country/Region</label><br>
                                                <select class="form-select" name="country_id" id="country_id" aria-label="Default select example">
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
                                                <label for="" class="form-ms-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp" value="{{ $address->first_name ?? '' }}" required>
                                             </div>
                                             <div class="mb-3">
                                                <label for="" class="form-ms-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp" value="{{ $address->last_name ?? '' }}" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label for="" class="form-ms-label"> Address</label>
                                                <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Address" value="{{ $address->address ?? '' }}" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label for="" class="form-ms-label"> Mobile number</label>
                                                <input type="number" name="phone" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp" value="{{ $address->phone ?? '' }}" required>
                                                <label for="">May be used to assist delivery</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label for="" class="form-ms-label">Pincode</label>
                                                <input type="number" class="form-control form-control-ms" name="pincode" value="{{ $address->pincode ?? '' }}" required>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                               <label for="" class="form-ms-label">Flat, House no., Building, Company, Apartment</label>
                                                <input type="text" name="apartment" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp"  value="{{ $address->apartment ?? '' }}" required>
                                             </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                               
                                                   <label for="" class="form-ms-label">Area, Street, Sector, Villaget</label>
                                                <input type="text" name="address" class="form-control  form-control-ms" id=""
                                                   aria-describedby="emailHelp"  value="{{ $address->address ?? '' }}" required>
                                             </div>
                                          </div>
                                          </div> -->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label for=""  class="form-ms-label">Landmark</label>
                                                <input type="text" name="landmark" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp"  value="{{ $address->landmark ?? '' }}" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6 pe-2">
                                             <div class="mb-3">
                                                <label for=""  class="form-ms-label">Town/City</label>
                                                <input type="text" name="city" class="form-control form-control-ms" id=""
                                                   aria-describedby="emailHelp"  value="{{ $address->city ?? '' }}" required>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <label for="" class="form-ms-label">State</label>
                                             <select class="form-select" name="state_id" id="state_id" aria-label="Default select example" required>
                                                <option>Select</option>
                                                @foreach($states as $states)
                                                <option value="{{$states->id}}">{{$states->state_name}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <button  type="submit"class="complete-order">
                                             UPDATE ADDRESS
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
      <section class="footer">
         <div class="container">
            <div class="col-md-12">
               <div class="newsletter-container">
                  <div class="hero-section">
                     <div class="content-wrapper">
                        <div class="content-grid">
                           <div class="company-info">
                              <div class="company-details">
                                 <h1 class="company-name">MS NATURAL PRODUCT</h1>
                                 <div class="contact-info">
                                    <div style="margin-bottom: 10px;">
                                       <i class="fas fa-home"></i>
                                       <div>
                                          <address>
                                             <div style="margin-bottom: 0px;">Kondotty, Malappuram Kerala
                                             </div>
                                             <div>IndiaPIN : 673638</div>
                                          </address>
                                       </div>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                       <i class="fas fa-phone-volume"></i>
                                       <div class="phone-number">+9190487 31831</div>
                                    </div>
                                    <div style="margin-bottom: 10px;">
                                       <i class="fas fa-envelope"></i>
                                       <div class="email-address">info@msnaturalproducts.com</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="footer-second">
                              <div class="logo-container-footer">
                                 <img loading="lazy" src="images/footer/Rectangle 35.png" class="logo-footer"
                                    alt="MS Natural Products Logo" />
                              </div>
                              <div class="main-description">
                                 <p class="company-description">
                                    MS Natural Products, we understand the importance of natural
                                    ingredients in enhancing beauty and promoting overall
                                    well-being. That's why we handpick the finest herbs and
                                    botanicals to create our products, ensuring that every drop
                                    is infused with goodness straight from nature.
                                 </p>
                              </div>
                           </div>
                           <div class="newsletter-content">
                              <div class="newsletter-wrapper">
                                 <div class="newsletter-header">
                                    <div class="header-grid">
                                       <div class="title-container">
                                          <h2 class="newsletter-title">NEWSLETTER</h2>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="description-section">
                                    <div class="description-grid">
                                       <div class="cta-container">
                                          <p class="cta-text">
                                             Join our email for exclusive offers and the latest news.
                                          </p>
                                          <div class="search-box">
                                             <input type="text" placeholder="Search..."
                                                class="search-input" />
                                             <button class="search-button">SUBSCRIBE</button>
                                          </div>
                                          <ul class="follow-us">
                                             <span>Follow US : </span>
                                             <li><i class="fab fa-facebook-f"></i></li>
                                             <li><i class="fab fa-pinterest-p"></i></li>
                                             <li><i class="fab fa-instagram"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-globe"></i></li>
                                          </ul>
                                       </div>
                                    </div>
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
      <a href="" class="btn-whatsapp-pulse">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
      </a>
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