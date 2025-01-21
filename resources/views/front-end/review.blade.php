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
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
      <style>
.star-rating .star {
    font-size: 2rem;
    cursor: pointer;
    color: #ddd; /* Default color */
    transition: transform 0.2s ease, color 0.2s ease;
}

/* Filled stars */
.star-rating .star.filled {
    color: #ffc107; /* Highlighted color */
}

/* Add scaling effect */
.star-rating .star.clicked {
    transform: scale(1.5); /* Temporarily enlarge the star */
    color: #ff9800; /* Add a glow color effect */
    transition: transform 0.2s ease, color 0.2s ease;
}
      </style>
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
                  <div class="review-address-main">
                     <form action="{{ url('save.review') }}" method="POST">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="review-head">
                              <h1> Write a review</h1>
                              <p>Rating</p>
                              <div class="star-rating" id="star-rating">
    <span class="star" data-value="1">★</span>
    <span class="star" data-value="2">★</span>
    <span class="star" data-value="3">★</span>
    <span class="star" data-value="4">★</span>
    <span class="star" data-value="5">★</span>
</div>
                            
<input type="hidden" id="rating-value" name="rating" value="">
                              <!-- <div class="review-title-div">
                                 <input type="email" class="form-control review-title" id="email" name="titile" placeholder="Give Your Review Title" required>
                                 </div> -->
                              <div class="review-comments">
                                 <p>Review</p>
                                 <textarea name="review" rows="4" class="w-100" placeholder="Write Your Comments Here"></textarea>
                              </div>
                              <p>Picture (Optional)</p>
                              <div class="picture-video-optional">
                                 <div class="file-upload">
                                    <span class="plus-sign">+</span>
                                    <input type="file" name="image" />
                                 </div>
                              </div>
                              <div class="name-displayed-by-name">
                                 <h6>Name (displayed publicly like <span></span>)</h6>
                                 <input type="text" class="form-control review-title" id="name" name="name" placeholder="Enter your name (public)" required>
                              </div>
                              <div class="review-bottom-para">
                                 <p>How we use your data:We'll only contact you about the review you left,and only if necessary.By submitting  your review,
                                    you agree to judge.me's <a href="">terms</a>, <a href=""> pirvacy</a> and <a href="">content</a> policies 
                                 </p>
                              </div>
                              <div class="review-buttons">
                                 <button class="cancel-review">Cancel Review</button>
                                 <button type="submit" class="submit-review">Submit Review</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     </from>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- start footer -->
      @include('front-end.include.footar')
      <!--  -->
      <!-- end footer -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
     $(document).ready(function () {
    const stars = $('#star-rating .star');
    const ratingValue = $('#rating-value'); // Hidden input for storing the rating

    // Handle star click event
    stars.on('click', function () {
        const value = $(this).data('value'); // Get star's value
        console.log('Clicked star value:', value); // Debugging log
        ratingValue.val(value); // Set the hidden input value

        // Update star display
        stars.removeClass('filled clicked'); // Remove previous classes
        stars.each(function (index) {
            if (index < value) {
                $(this).addClass('filled'); // Fill stars up to the clicked star
            }
        });

        // Add clicked effect
        $(this).addClass('clicked');
        setTimeout(() => {
            $(this).removeClass('clicked'); // Remove effect after animation
        }, 200); // Match duration with CSS animation
    });

    // Initialize stars based on default value
    const defaultRating = parseInt(ratingValue.val() || 0);
    stars.each(function (index) {
        if (index < defaultRating) {
            $(this).addClass('filled');
        }
    });
});
      </script>
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
   </body>
</html>