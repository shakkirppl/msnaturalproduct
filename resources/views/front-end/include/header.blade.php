<!-- header start -->
<div class="row">
   <div class="showcase">
      <div class="showcase-wrapper">
         <div class="announcement-bar">
            <div class="announcement-content">
               <div class="announcement-text">
                  <!-- www.msnaturalproducts.com Now Changed to
                  <span class="highlight">www.msnaturalproduct.com</span> -->
               </div>
            </div>
         </div>
         <header class="header">
            <div class="header-top">
               <div class="language-selector">
                  <div class="">
                     @if($language=='ar')
                     <a href="{{url('lang/change/en')}}"  class="lang-btn" >ENG</a>
                     @else
                     <a href="{{url('lang/change/ar')}}" class="lang-btn">{{ __('main.Arabic') }}</a>
                     @endif
                  </div>
                  <div class="dropdown">
                     <form action="{{ route('set.country') }}" method="POST">
                        @csrf
                        <select id="country" name="country" class="styled-dropdown styled-select" onchange="this.form.submit()">
                        @foreach($countries as $country)
                        <option value="{{ $country->code }}" {{ session('activecountry') == $country->code ? 'selected' : '' }}>
                        {{ $country->country_name }}
                        </option>
                        @endforeach
                        </select>
                     </form>
                  </div>
               </div>
               <div class="logo-wrapper">
                  <a href="{{url('/')}}"> 
                  <img src="{{URL::to('/')}}/front-end/images/header/logo-small.png" alt="Company Logo" class="logo" /></a>
               </div>
               <div class="social-icons">
                  <div class="logo-container-profile">
                     <img src="{{URL::to('/')}}/front-end/images/header/profile.png" alt="Company Logo" class="social-icon profile-icon" />
                     <div class="info-box-profile hidden-profile">
                     @if(Auth::user())
                     <div class="account-drop"><a href="{{url('account')}}" >{{ __('main.Account') }}</a></div>   
                     <div class="account-drop">
    <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
</div>
                     @else
                     <div class="account-drop"><a href="{{url('user-login')}}" >{{ __('main.Login') }}</a></div>   
                     <div class="account-drop"><a href="{{url('user-register')}}" >{{ __('main.Signup') }}</a></div>   
                     @endif
                     </div>
                  </div>
                  <div class="cart-container">
                     <img style="position: relative;" src="{{URL::to('/')}}/front-end/images/header/cart.png" alt="Cart Icon"
                        class="social-icon cart-icon"   />
                     <span class="cart-no">{{ $cartItems->count() }}</span>
                     <!-- Sliding Box -->
                  </div>
                  <div class="menu-container">
                     <img  src="{{URL::to('/')}}/front-end/images/header/menu.png" alt="Cart Icon"
                        class="social-icon menu-icon"   />
                  </div>
               </div>
            </div>
            <nav class="nav-menu">
               <div class="logo-wrapper">
                  <a href="{{url('/')}}"> <img src="{{URL::to('/')}}/front-end/images/header/logo-small.png" alt="Company Logo" class="logo" /></a>
               </div>
               <div class="desk-top-link">
                  <div class="desktop-sub-link">
                     <a href="{{url('/')}}" class="nav-link active">{{ __('main.Home') }}</a>
                     <a href="{{url('product-view/hair-care-oil')}}" class="nav-link">{{ __('main.HAIR') }}</a>
                     <a href="{{url('product-view/skin-care-oil')}}" class="nav-link">{{ __('main.SKIN') }}</a>
                     <a href="{{url('product-view/face-pack-powder')}}" class="nav-link">{{ __('main.FACE') }}</a>
                     <a href="{{url('product-view/hair-care-oil')}}" class="nav-link ">{{ __('main.NEW_LAUNCH') }}</a>
                     <a href="#combo" class="nav-link ">{{ __('main.Combo') }}</a>
                     <a href="{{url('about-us')}}" class="nav-link ">{{ __('main.About_Us') }}</a>
                     <a href="{{url('blog')}}" class="nav-link">{{ __('main.BLOG') }}</a>
                  </div>
               </div>
               <div class="mobile-link">
                  <div class="desktop-sub-link">
                     <a href="{{url('/')}}" class="nav-link active">{{ __('main.Home') }}</a>
                     <a href="{{url('product-view/hair-care-oil')}}" class="nav-link">{{ __('main.HAIR') }}</a>
                     <a href="{{url('product-view/skin-care-oil')}}" class="nav-link">{{ __('main.SKIN') }}</a>
                     <a href="{{url('product-view/face-pack-powder')}}" class="nav-link">{{ __('main.FACE') }}</a>
                     <a href="{{url('product-view/hair-care-oil')}}" class="nav-link ">{{ __('main.NEW_LAUNCH') }}</a>
                  </div>
               </div>
               <div class="language-selector">
                  <div class="sticky-nav">
                     <div class="sticky-lang-btn">
                        @if($language=='ar')
                        <a href="{{url('lang/change/en')}}"  class="lang-btn" >ENG</a>
                        @else
                        <a href="{{url('lang/change/ar')}}" class="lang-btn">{{ __('main.Arabic') }}</a>
                        @endif
                     </div>
                     <div class="dropdown">
                        <form action="{{ route('set.country') }}" method="POST">
                           @csrf
                           <select id="country" name="country" class="styled-dropdown styled-select" onchange="this.form.submit()">
                           @foreach($countries as $country)
                           <option value="{{ $country->code }}" {{ session('activecountry') == $country->code ? 'selected' : '' }}>
                           {{ $country->country_name }}
                           </option>
                           @endforeach
                           </select>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="social-icons">
                  <div class="logo-container-profile">
                     <img src="{{URL::to('/')}}/front-end/images/header/profile.png" alt="Company Logo" class="social-icon profile-icon" />
                     <div class="info-box-profile hidden-profile">
                      @if(Auth::user())
                     <div class="account-drop"><a href="{{url('account')}}" >{{ __('main.Account') }}</a></div> 
                      <div class="account-drop">
    <a href="{{ route('logout') }}">Logout</a>
</div>
                     @else
                     <div class="account-drop"><a href="{{url('user-login')}}" >{{ __('main.Login') }}</a></div>   
                     <div class="account-drop"><a href="{{url('user-register')}}" >{{ __('main.Signup') }}</a></div>   
                     @endif 
                     </div>
                    

                  </div>
                  <div class="cart-container">
                     <img style="position: relative;" src="{{URL::to('/')}}/front-end/images/header/cart.png" alt="Cart Icon"
                        class="social-icon cart-icon"  />
                     <span class="cart-no">{{ $cartItems->count() }}</span>
                  </div>
                  <div>
                     <div class="menu-container">
                        <img  src="{{URL::to('/')}}/front-end/images/header/menu.png" alt="Cart Icon"
                           class="social-icon menu-icon"   />
                     </div>
                  </div>
               </div>
            </nav>
         </header>
      </div>
   </div>
</div>
<!-- header close -->
<div class="cart-box" id="cart-box">
   <div class="top-cart-box"></div>
   <div class="cart-box-head">
      <div>
         <h1>{{ __('main.Cart') }}</h1>
      </div>
      <div>
         <button class="close-btn-cart-box" id="close-btn-cart-box">&times;</button>
      </div>
   </div>
   <div class="cart-items-section" id="cart-items-section">
      <!-- Dynamic cart items will be inserted here -->
      @foreach($cartItems as $item)
      <div class="row p-1">
         <div class="col-md-4 col-3 p-1">
            <div class="cart-box-img">
               <img src="{{ url('uploads/products/' . $item->attributes->image) }}" alt="">
            </div>
         </div>
         <div class="col-md-8 col-9 p-1">
            <div class="cart-box-contents">
               <h1>{{ $item->name }}</h1>
               <p>{{ $item->attributes->currency }} {{ $item->price }}</p>
               <div class="cart-box-count">
                  <div class="remove">
                     <button class="remove">
                        <a href="{{ route('cart.remove', ['id' => $item->id]) }}" onclick="return confirm('Are you sure you want to remove this item?')" class="remove-button" aria-label="Remove item">{{ __('main.Remove') }}</a>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>

   <!-- Static Content -->
   <div class="cart-box-bottom">
      <div class="sub-total">
         <h1>{{ __('main.Total_Payable') }}</h1>
      </div>
      <div class="sub-total-amount">
         <h1>{{$currency}} {{Cart::getTotal()}}</h1>
         <!-- Cart total -->
      </div>
   </div>
   <div class="cart-box-bottom">
      <p style="margin-bottom: 0px;">{{ __('main.cart_shipp_amount') }}</p>
   </div>
   <div class="p-1">
      <a href="{{url('checkout')}}"><button class="check-out">{{ __('main.Check_Out') }}</button></a>
   </div>
   <div class="p-1">
      <a href="{{url('view-cart')}}"><button class="check-out">{{ __('main.View_Cart') }}</button></a>
   </div>
</div>


<div class="menu-box" id="menu-box">
   <div class="top-cart-box"></div>
   <div class="cart-box-head">
      <div>
         <h1></h1>
      </div>
      <div> <button class="close-btn-menu-box" id="close-btn-menu-box">&times;</button></div>
   </div>
   <!--<div class="row p-3">-->
   <!--   <div class="col-md-4">-->
   <!--      <div class="cart-box-img">-->
   <!--         <img src="images/product-detail/Rectangle 131.png" alt="">-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   <div>
      <a href="{{url('/')}}" class="nav-link active">{{ __('main.Home') }}</a>
      <a href="{{url('product-view/hair-care-oil')}}" class="nav-link">{{ __('main.HAIR') }}</a>
      <a href="{{url('product-view/skin-care-oil')}}" class="nav-link">{{ __('main.SKIN') }}</a>
      <a href="{{url('product-view/face-pack-powder')}}" class="nav-link">{{ __('main.FACE') }}</a>
      <a href="{{url('product-view/hair-care-oil')}}" class="nav-link ">{{ __('main.NEW_LAUNCH') }}</a>
      <a href="{{url('about-us')}}" class="nav-link ">{{ __('main.About_Us') }}</a>
      <a href="{{url('blog')}}" class="nav-link">{{ __('main.BLOG') }}</a>
   </div>
</div>
<script>
   function setMarqueeDirection(isRTL) {
    const marqueeWrapper = document.querySelector('.marquee-wrapper');
    const marqueeContent = document.querySelector('.marquee-content');
    
    if (isRTL) {
        marqueeWrapper.setAttribute('dir', 'rtl');
        marqueeContent.style.animation = 'marquee-rtl 20s linear infinite';
    } else {
        marqueeWrapper.setAttribute('dir', 'ltr');
        marqueeContent.style.animation = 'marquee-ltr 20s linear infinite';
    }
   }
   
   // Example usage:
   // If the language is Arabic, call setMarqueeDirection(true)
   setMarqueeDirection(true);
   
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    // Check scroll event
    $(window).on('scroll', function () {
        var scrollPosition = $(this).scrollTop();
        
        // Add or remove the sticky class based on the scroll position
        if (scrollPosition > 0) { // Change 0 to your desired scroll position
            $('.header').addClass('sticky-header');
   
   
        } else {
            $('.header').removeClass('sticky-header');
        }
    });
    
   });
   
      // Select all cart icons and the cart box
   const cartIcons = document.querySelectorAll('.cart-icon'); // All elements with the class 'cart-icon'
   const cartBox = document.querySelector('.cart-box'); // Cart box element
   const closeButton = document.querySelector('.close-btn-cart-box'); // Close button within the cart box
   
   // Add a click event to each cart icon
   cartIcons.forEach((icon) => {
   icon.addEventListener('click', () => {
    cartBox.classList.add('active'); // Show the cart box
   });
   });
   
   // Close the cart box when the close button is clicked
   closeButton.addEventListener('click', () => {
   cartBox.classList.remove('active'); // Hide the cart box
   });
   
   
   
         // Select all cart icons and the cart box
   const menuIcons = document.querySelectorAll('.menu-icon'); // All elements with the class 'cart-icon'
   const menuBox = document.querySelector('.menu-box'); // Cart box element
   const menucloseButton = document.querySelector('.close-btn-menu-box'); // Close button within the cart box
   
   // Add a click event to each cart icon
   menuIcons.forEach((icon) => {
   icon.addEventListener('click', () => {
   menuBox.classList.add('active'); // Show the cart box
   });
   });
   
   // Close the cart box when the close button is clicked
   menucloseButton.addEventListener('click', () => {
   menuBox.classList.remove('active'); // Hide the cart box
   });
   
   
   document.addEventListener("DOMContentLoaded", function () {
    const logoContainers = document.querySelectorAll(".logo-container-profile");
   
    logoContainers.forEach((logoContainer) => {
        const infoBox = logoContainer.querySelector(".info-box-profile");
   
        logoContainer.addEventListener("click", () => {
            // Toggle visibility of the current box
            infoBox.classList.toggle("show-profile");
   
            // Optionally, close other open info-boxes
            logoContainers.forEach((otherContainer) => {
                if (otherContainer !== logoContainer) {
                    const otherInfoBox = otherContainer.querySelector(".info-box-profile");
                    otherInfoBox.classList.remove("show-profile");
                }
            });
        });
    });
   });
   
</script>