
   <section class="footer footer-desk">
   <div class="container">
      <div class="col-md-12">
         <div class="newsletter-container">
            <div class="hero-section">
               <div class="content-wrapper">
                  <div class="content-grid">
                     <div class="company-info">
                        <div class="company-details">
                           <h1 class="company-name">{{ __('main.ms_natural_products') }}</h1>
                           <div class="contact-info">
                              <div style="margin-bottom: 10px;">
                                 <i class="fas fa-home"></i>
                                 <div>
                                    <address>
                                       <div style="margin-bottom: 0px;">{{ __('main.address') }}</div>
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
                           <img loading="lazy" src="{{URL::to('/')}}/front-end/images/footer/Rectangle 35.png" class="logo-footer"
                              alt="MS Natural Products Logo" />
                        </div>
                        <div class="main-description">
                           <p class="company-description">
                           {{ __('main.footar_para') }}
                           </p>
                        </div>
                     </div>
                     <div class="newsletter-content">
                        <div class="newsletter-wrapper">
                           <div class="newsletter-header">
                              <div class="header-grid">
                                 <div class="title-container">
                                    <h2 class="newsletter-title">{{ __('main.NEWSLETTER') }}</h2>
                                 </div>
                              </div>
                           </div>
                           <div class="description-section">
                              <div class="description-grid">
                                 <div class="cta-container">
                                    <p class="cta-text">
                                    {{ __('main.Join_our_email') }}
                                    </p>
                                    <div class="search-box">
                                       <input type="text" placeholder="Search..." class="search-input" />
                                       <button class="search-button">{{ __('main.SUBSCRIBE') }}</button>
                                    </div>
                                    <ul class="follow-us">
                                       <span>{{ __('main.Follow_US') }}: </span>
                                       <li><i class="fab fa-facebook-f"></i></li>
                                       <li><i class="fab fa-pinterest-p"></i></li>
                                       <li> <a href="https://www.instagram.com/ms_natural_products/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li>
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
<section class="footer-mobile">
   <div class="product-main-div">
      <div class="row">
         <div class="col-md-12">
            <div class="footer-mob-community">
               <h1>{{ __('main.Join_our_email') }}</h1>
               <div class="subscribe-container">
                  <input 
                     type="email" 
                     placeholder="Enter your email address" 
                     class="subscribe-input" 
                     aria-label="Email Address"
                     />
                  <button class="subscribe-button">{{ __('main.SUBSCRIBE') }}</button>
               </div>
               <h1>{{ __('main.Follow_US') }}</h1>
               <ul class="follow-us-mobile">
                  <li><i class="fab fa-facebook-f"></i></li>
                  <li><i class="fab fa-pinterest-p"></i></li>
                  <li>
  <a href="https://www.instagram.com/ms_natural_products/" target="_blank" rel="noopener noreferrer">
    <i class="fab fa-instagram" aria-hidden="true"></i>
  </a>
</li>
                  <li><i class="fab fa-twitter"></i></li>
                  <li><i class="fas fa-globe"></i></li>
               </ul>
               <!-- Accordion Tab -->
               <!-- Accordion -->
               <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        SHOP
                        </button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           This is the first item's accordion body.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        INFORMATION
                        </button>
                     </h2>
                     <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           This is the second item's accordion body.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        POLICIES
                        </button>
                     </h2>
                     <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           This is the third item's accordion body.
                        </div>
                     </div>
                  </div>
               </div>
               <div class="footer-para">
                  <p>{{ __('main.footar_para') }}</p>
               </div>
               <div class="footer-logo">
                  <a href="{{url('/')}}"> <img src="{{URL::to('/')}}/front-end/images/header/logo-small.png" alt="Company Logo"  /></a>
               </div>
               <div class="footer-address">
                  <p>{{ __('main.ms_natural_products') }}</p>
               </div>
               <div class="contact-info-footer-mobile">
                  <div style="margin-bottom: 10px;">
                     <div>
                        <address>
                           <div style="margin-bottom: 0px;">{{ __('main.address') }} </div>
                           <div>IndiaPIN : 673638</div>
                        </address>
                     </div>
                  </div>
                  <div style="margin-bottom: 10px;">
                     <div class="phone-number">+9190487 31831</div>
                  </div>
                  <div style="margin-bottom: 10px;">
                     <div class="email-address">info@msnaturalproducts.com</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<a href="https://wa.me/919048731831" class="btn-whatsapp-pulse" target="_blank">
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
</a>
<!--  -->
<!-- end footer -->