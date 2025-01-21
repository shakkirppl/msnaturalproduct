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
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
      <!-- mr dafoe -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap" rel="stylesheet">
   </head>
   <section>
      <div class="banner">
         <img src="images/banner.jfif" alt="Banner Image" class="banner-img">
         <div class="main-header-contents">
            <h1 class="center-heading">MS Natural Products </h1>
         </div>
         <div class="main-header">
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-md-2 m-auto">
                        <div class="top-first-head">
                           <h1>Splash</h1>
                        </div>
                     </div>
                     <div class="col-md-10">
                        <div class="top-second-head">
                           <h1>www.msnaturalproducts.com Now Changed to www.msnaturalproduct.com</h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bottom-header sticky">
               <div class="row">
                  <nav class="navbar">
                     <div class="col-md-6">
                        <div class="bottom-first-head">
                           <img src="images/logo.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="bottom-second-head">
                           <div>
                              <button id="toggleOn" class="button btn-on">Arabic</button>
                              <button id="toggleOff" class="button btn-off">English</button>
                           </div>
                           <div>
                              <select id="country" name="country" class="styled-dropdown">
                                 <option value="usa">United States</option>
                                 <option value="canada">Canada</option>
                                 <option value="uk">United Kingdom</option>
                                 <option value="australia">Australia</option>
                                 <option value="india">India</option>
                                 <!-- Add more countries as needed -->
                              </select>
                           </div>
                           <div>
                              <ul class="bottom-list">
                                 <li><img src="images/header/profile.png" alt=""></li>
                                 <li><img src="images/header/cart.png" alt=""></li>
                                 <li><img src="images/header/menu.png" class="toggle-box" alt=""></li>
                                 <li> <img src="images/header/menu.png" alt="Clickable Image" class="cart-box"></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!-- Box that will slide in from the right -->
                     <div class="sliding-box">
                        <!-- Content inside the box -->
                        <div class="sliding-header">
                           <div class="sliding-box-head">
                              <p>This is a sliding box</p>
                           </div>
                           <div class="close-icon">
                              <i class="far fa-times-circle"></i>
                           </div>
                        </div>
                        <div class="list-menu">
                           <ul>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                              <li>Our Products</li>
                           </ul>
                        </div>
                     </div>
                     <div class="cart-sliding-box">
                        <div class="cart-close-icon">
                           <i class="far fa-times-circle"></i>
                        </div>
                        <div class="cart-sliding-contents">
                           <div class="cart-sliding-head">
                              <h1>Your cart</h1>
                           </div>
                           <div class="cart-content-box">
                              <div class="cart-content-img">
                                 <img src="images/cart/7bfce5e7b22b23472480e71b68444c8a.jfif" alt="">
                              </div>
                              <div class="cart-content-deatails">
                                 <h1>Hair Care Oil</h1>
                                 <p>250ML</p>
                                 <p class="cart-price-div">RS 519.00</p>
                                 <div class="cart-product-quantity">
                                    <button class="cart-decrement" onclick="decrement()">−</button>
                                    <input type="number" id="quantity" value="1" min="1" readonly />
                                    <button class="cart-increment" onclick="increment()">+</button>
                                 </div>
                              </div>
                           </div>
                           <div class="cart-total-payment">
                              <div class="total">
                                 <h6>TOTAL</h6>
                              </div>
                              <div class="total-payment">
                                 <p>RS 1408.00</p>
                              </div>
                           </div>
                           <div class="cart-bottom-para">
                              <p>Shipping, Taxes, and Discounts Will be calculated at the checkout </p>
                           </div>
                           <div class="cart-proceed-checkout">
                              <button>PROCEED TO CHECKOUT</button>
                           </div>
                        </div>
                        <div class="cart-view">
                           <button>
                           View Cart
                           </button>
                        </div>
                     </div>
               </div>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="second-banner">
         <img src="{{URL::to('/')}}/front-end/images/second-banner-img.png" alt="">
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>Our Products</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <!-- <a href=""> -->
                  <div class="product-box">
                  <div class="product-box-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product.png" alt="">
                  </div>
                  <div class="product-box-banner-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product-banner.png" alt="">
                     <div class="product-box-contents-details">
                        <h1>{{$hair_oil->name}}</h1>
                        <!-- <p class="list-details">hair fall, dandruff, Premature gray</p> -->
                      
                     </div>

                     <div class="product-box-details-content-bottom">
                        <div class="list-button">
                           <ul>
                              <li <a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="1" data-store="{{$storeId}}">250 ML</a></li>
                              <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="2" data-store="{{$storeId}}">500 ML</a></li>
                              <li><a class="add-cart-btn hair_price" style="cursor:pointer;"  data-pro_id="3" data-store="{{$storeId}}">1 L</a></li>
                           </ul>
                        </div>
                        <div class="price-tag">
                        <p class="price-display">{{$currency}}. 519.00</p>
                        </div>
                     </div>
                  </div>
                  <div class="buy-now-button">
   <button class="buy-now-btn" data-product-size-id="1" data-store-id="{{$storeId}}">BUY NOW</button>
</div>
               </div>
            <!-- </a> -->
            </div>
            <div class="col-md-4">
             <div class="product-box">
                  <div class="product-box-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product.png" alt="">
                  </div>
                  <div class="product-box-banner-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product-banner.png" alt="">
                     <div class="product-box-contents-details">
                        <h1>{{$skin_oil->name}}</h1>
                        <!-- <p class="list-details">hair fall, dandruff, Premature gray</p> -->
                      
                     </div>

                     <div class="product-box-details-content-bottom">
                        <div class="list-button">
                           <ul>
                           <li <a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="4" data-store="{{$storeId}}">250 ML</a></li>
                              <li><a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="5" data-store="{{$storeId}}">500 ML</a></li>
                              <li><a class="add-cart-btn price" style="cursor:pointer;"  data-pro_id="6" data-store="{{$storeId}}">1 L</a></li>
                           </ul>
                        </div>
                        <div class="price-tag">
                        <p class="price-display">{{$currency}}. 519.00</p>
                        </div>
                     </div>
                  </div>
                  <div class="buy-now-button">
   <button class="buy-now-btn" data-product-size-id="4" data-store-id="{{$storeId}}">BUY NOW</button>
</div>
               </div>
          
            </div>
            @if($face_pack)
            <div class="col-md-4">
               <a href=""><div class="product-box">
                  <div class="product-box-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product.png" alt="">
                  </div>
                  <div class="product-box-banner-img">
                     <img src="{{URL::to('/')}}/front-end/images/ourproduct/product-banner.png" alt="">
                     <div class="product-box-contents-details">
                        <h1>{{$face_pack->name}}</h1>
                        <!-- <p class="list-details">hair fall, dandruff, Premature gray</p> -->
                      
                     </div>

                     <div class="product-box-details-content-bottom">
                    
                        <div class="price-tag">
                           <p>{{$currency}}. 519.00</p>
                        </div>
                     </div>
                  </div>
                  <div class="buy-now-button">
                  <button class="buy-now-btn" data-product-size-id="7" data-store-id="{{$storeId}}">BUY NOW</button>
                  </div>
               </div>
              </a>
            </div>
         @endif

         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>Combo Pack</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-6 combo-pack">
               <div class="combo-pack-box">
                  <div class="combo-box-one">
                     <img class="w-100 " style="height: 280px;" src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg1.png" alt="">
                     <div class="combo-box-contents">
                        <h1>Hair Care Oil 250ml + Skin Care Oil 250ml Combo</h1>
                       
                     </div>
                     <div class="combo-box-price-div">
                        <a  class="combo-box-price">{{$currency}}. 939.00</a>
                     </div>
                     <div class="combo-box-contents-bottom">
                     <button class="buy-now-btn" data-product-size-id="8" data-store-id="{{$storeId}}">BUY NOW</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <img class="w-100" style="height: 280px;" src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product 1.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-md-6 combo-pack">
               <div class="combo-pack-box">
                  <div class="combo-box-one">
                     <img class="w-100" style="height: 280px;"  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg2.png" alt="">
                     <div class="combo-box-contents">
                        <h1>Hair Care Oil 250ml + Skin Care Oil 250ml Combo</h1>
                        <!-- <a href="" class="combo-box-price">Rs. 939.00</a> -->
                     </div>
                     <div class="combo-box-price-div">
                        <a  class="combo-box-price">{{$currency}}. 939.00</a>
                     </div>
                     <div class="combo-box-contents-bottom">
                     <button class="buy-now-btn" data-product-size-id="9" data-store-id="{{$storeId}}">BUY NOW</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <img class="w-100" style="height: 280px;"  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product 2.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-md-6 combo-pack">
               <div class="combo-pack-box">
                  <div class="combo-box-one">
                     <img class="w-100" style="height: 280px;"  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product bg3.png" alt="">
                     <div class="combo-box-contents">
                        <h1>Hair Care Oil 250ml + Skin Care Oil 250ml Combo</h1>
                        <!-- <a href="" class="combo-box-price">Rs. 939.00</a> -->
                     </div>

                     <div class="combo-box-price-div">
                        <a class="combo-box-price">{{$currency}}. 939.00</a>
                     </div>
                     <div class="combo-box-contents-bottom">
                     <button class="buy-now-btn" data-product-size-id="11" data-store-id="{{$storeId}}">BUY NOW</button>
                     </div>
                  </div>
                  <div class="combo-box-two">
                     <img class="w-100" style="height: 280px;"  src="{{URL::to('/')}}/front-end/images/comboproduct/Combo Product 3.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="middle-line"></div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="oil-desc-main">
         <div class="container">
            <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
            <div class="oil-desc">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-head">
                           <h4>MS NATURAL PRODUCT</h4>
                           <h1>Hair Care Oil</h1>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="oil-desc-img">
                           <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Product img.png" alt="">
                        </div>
                     </div>
                     <div class="col-md-4 m-auto">
                        <div class="oil-desc-des">
                           <p>This hair oil which is Made with pure coconut oil with 21 herbs treats various hair issues like hair fall, dandruff, Premature gray, hair to grow thick and black, Split ends of hair,and gives you better sleep reduces mental tension, allergies, migraines etc.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="oil-desc-main">
        <div class="container">
           <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
           <div class="oil-desc">
              <div class="container">
                 <div class="row">

                  <div class="col-md-4 m-auto">
                    <div class="oil-desc-des">
                       <p>This hair oil which is Made with pure coconut oil with 21 herbs treats various hair issues like hair fall, dandruff, Premature gray, hair to grow thick and black, Split ends of hair,and gives you better sleep reduces mental tension, allergies, migraines etc.</p>
                    </div>
                 </div>
                    
                    <div class="col-md-4">
                       <div class="oil-desc-img">
                        <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Product img.png" alt="">
                       </div>
                    </div>

                    <div class="col-md-4 m-auto">
                      <div class="oil-desc-head">
                         <h4>MS NATURAL PRODUCT</h4>
                         <h1>Hair Care Oil</h1>
                      </div>
                   </div>
                
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="oil-desc-main">
      <div class="container">
         <img src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Banner img.png" alt="">
         <div class="oil-desc">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 m-auto">
                     <div class="oil-desc-head">
                        <h4>MS NATURAL PRODUCT</h4>
                        <h1>Hair Care Oil</h1>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="oil-desc-img">
                        <img class="w-50" src="{{URL::to('/')}}/front-end/images/haircareoil/Hair care oil Product img.png" alt="">
                     </div>
                  </div>
                  <div class="col-md-4 m-auto">
                     <div class="oil-desc-des">
                        <p>This hair oil which is Made with pure coconut oil with 21 herbs treats various hair issues like hair fall, dandruff, Premature gray, hair to grow thick and black, Split ends of hair,and gives you better sleep reduces mental tension, allergies, migraines etc.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="middle-line"></div>
            </div>
         </div>
      </div>
   </section>

   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>Video Gallery</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="insta-head">
                  <h1>Instagram</h1>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="insta-gram-slider">
               <div class="owl-carousel owl-theme" id="instagram-slider">
                  <div class="item">
                  <div class="insta-img">
                    <img  style="height: 330px;" src="{{URL::to('/')}}/front-end/images/insta.png" alt="">
                    <div class="insta-gram-icon">
                      <img  src="{{URL::to('/')}}/front-end/images/Instagram/instagram icon.png" alt="">
                    </div>
                  </div>
                  </div>
                  <div class="item">
                    <div class="insta-img">
                      <img style="height: 330px;"  src="{{URL::to('/')}}/front-end/images/insta.png" alt="">
                      <div class="insta-gram-icon">
                        <img  src="{{URL::to('/')}}/front-end/images/Instagram/instagram icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="insta-img">
                      <img style="height: 330px;" src="{{URL::to('/')}}/front-end/images/insta.png" alt="">
                      <div class="insta-gram-icon">
                        <img  src="images/Instagram/instagram icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="insta-img">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="insta-gram-icon">
                        <img  src="images/Instagram/instagram icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="insta-img">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="insta-gram-icon">
                        <img  src="images/Instagram/instagram icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="insta-img">
                      <img  style="height: 330px;" src="images/insta.png" alt="">
                      <div class="insta-gram-icon">
                        <img  src="images/Instagram/instagram icon.png" alt="">
                      </div>
                    </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="youtube-head">
                  <h1>Youtube</h1>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="youtube-slider">
               <div class="owl-carousel owl-theme" id="youtube-slider">
                <div class="item">
                  <div class="youtube-img">
                    <img  style="height: 330px;" src="images/insta.png" alt="">
                    <div class="youtube-icon">
                      <img src="{{URL::to('/')}}/front-end/images/Youtube/youtube icon.png" alt="">
                    </div>
                  </div>
                  </div>
                  <div class="item">
                    <div class="youtube-img">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="youtube-icon">
                        <img src="images/Youtube/youtube icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="youtube">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="youtube-icon">
                        <img src="images/Youtube/youtube icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="youtube">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="youtube-icon">
                        <img src="images/Youtube/youtube icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="youtube">
                      <img  style="height: 330px;" src="images/insta.png" alt="">
                      <div class="youtube-icon">
                        <img src="images/Youtube/youtube icon.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="youtube">
                      <img style="height: 330px;" src="images/insta.png" alt="">
                      <div class="youtube-icon">
                        <img src="images/Youtube/youtube icon.png" alt="">
                      </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="sub-heading">
                  <img src="{{URL::to('/')}}/front-end/images/face-img.png" alt="Banner Image" class="sub-banner-img">
                  <div class="heading">
                     <h1>What People Say?</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="testimonial-slider">
               <div class="owl-carousel owl-theme" id="testimonial-slider">
                  <div class="item">

                    <div class="testimonial-slider">
                      <img src="{{URL::to('/')}}/front-end/images/What People Say/what people say background.png" alt="">

                      <div class="testimonial-contents">
                        <h1>MS Natural products is a one-stop beauty destination that gives you access to a comprehensive range of Cosmetics, Skincare, Haircare.</h1>
                      <div class="testi-img">
                        <img src="{{URL::to('/')}}/front-end/images/testi-img.png" alt="">

                     
                     
                      </div>

                      <h1 class="testi-name">   THASKIN  OG</h1>
                      
                      </div>
                    </div>


                     <h4>1</h4>
                  </div>
                  <div class="item">
                     <h4>2</h4>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="footer-logo-img">
                  <img src="{{URL::to('/')}}/front-end/images/logo.png" alt="">
               </div>
            </div>
         </div>
      </div>
      <div class="footer">
         <img src="{{URL::to('/')}}/front-end/images/footerimg.png" alt="">
         <div class="footer-contents">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="ms-natuarl-product">
                        <h1>MS NATURAL PRODUCT</h1>
                        <ul>
                           <div style="display: flex;
                           justify-content: start;
                           align-items: baseline;">
                           <span ><i class="fas fa-home"></i></span> <li>  Kondotty, Malappuram KeralaIndiaPIN : 673638</li>
                           </div>
                           <div style="display: flex;
                           justify-content: start;
                           align-items: baseline;">
                              <span><i class="fas fa-phone-volume"></i></span>  <li>  +9190487 31831</li>
                           </div>
                           <div style="display: flex;
                           justify-content: start;
                           align-items:baseline;">
                              <span><i class="fas fa-envelope"></i></span>    <li>info@msnaturalproducts.com</li>
                           </div>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="footer-para">
                        <p>MS Natural Products, we understand the importance of natural ingredients in enhancing beauty and
                           promoting overall well-being. That's why we handpick the finest herbs and botanicals to create our
                           products, ensuring that every drop is infused with goodness straight from nature.
                        </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="search-inptut">
                        <h1>NEWSLETTER</h1>
                       <p> Join our email for exclusive offers and the latest news.</p>


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
   </section>
   <section class="footer-para-div">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <p>© 2024, <a href="">MS Natural Products</a> All Right Reserved</p>
            </div>
         </div>
      </div>

   </section>
   <body>
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
           dots:false,
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
           dots:false,
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
           dots:false,
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
         
                  // Check scroll direction
                  if (scrollTop > lastScrollTop) {
                     // Scrolling down
                     $bottomHeader.css('top', '0px');
                  } else {
                     // Scrolling up
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
         
           // Initialize the state
           let isOn = true;
         
           function toggle() {
             // Toggle the state
             isOn = !isOn;
         
             // Update button visibility based on the state
             if (isOn) {
               toggleOn.style.display = 'inline-block';
               toggleOff.style.display = 'none';
             } else {
               toggleOn.style.display = 'none';
               toggleOff.style.display = 'inline-block';
             }
           }
         
           // Set initial button display
           toggleOff.style.display = 'none';
         
           // Add event listeners to toggle the state on click
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

   </body>
</html>