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
            <div class="col-md-12">
               <div class="your-order-head mb-2">
                  <h1>Your Orders</h1>
               </div>
               @foreach ($orders as $order )
               <div class="your-order-details">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Order placed</th>
                           <th scope="col">Total</th>
                           <th scope="col">Ship to</th>
                           <th scope="col" colspan="2">Order # {{$order->order_no}}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <th scope="row">{{$order->date}}</th>
                           <td>{{$order->currecncy}} {{$order->total_amount}}</td>
                           <td>
                              <div class="dropdown-container">
                                 <div class="dropdown-box"> {{$order->billing_first_name}} {{$order->billing_second_name}}</div>
                                 <div class="dropdown-content">
                                    <p> {{$order->billing_address}}</p>
                                <p>{{$order->billing_city}},{{$order->billing_post_code}}</p>
                               
                                 <p> {{$order->billing_phone}},</p>
                                 
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="dropdown-container">
                                 <div class="dropdown-box">  Invoice</div>
                                 <div class="dropdown-content">
                                    <a href="">View Invoice</a>
                                    <br>
                                    <a href="">Download Invoice</a>
                                 </div>
                              </div>
                           </td>
                           
                           @if($order->delivery_status=='Delivered')
                           <td>
                              <a href="{{url('re-order/'.$order->id)}}">
                                 <div> <button class="reorder">Reorder</button></div>
                              </a>
                           </td>
                           @endif
                           @if($order->delivery_status=='Pending')
                           <td> <a href="{{url('cancel-order/'.$order->id)}}" onclick="return confirmCancel(event, this.href)">
                                 <div> <button  class="reorder">Cancel</button></div>
                              </a></td>
                              @else
                              <td> 
                                 <div> <label  class="reorder">Canceled</label></div>
                              </td>
                              @endif
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="delivered-details">
                  <h1 class="delivered-time">{{$order->delivery_status}} 
                  </h1>
                  <!-- <p class="delivered-details-sub-head">Package was handed to resident</p> -->
                  <div class="row">
                     @foreach ($order->orderdetails as $detail)
                     <div class="col-md-6 mt-5 mb-5">
                        <div class="row">
                           <div class="col-md-3 ">
                              <div class="delivered-img">
                                 <img src="{{ url('uploads/products/' . $detail->product->image) }}" alt="">
                              </div>
                           </div>
                           <div class="col-md-9 ">
                              <div class="delivered-details-contents">
                                 <h1>{{$detail->product->product_name}}</h1>
                                 <p>hair fall, dandruff, Premature gray</p>
                                 <div class="delivered-product-price">
                                    <p>{{$detail->currency}} {{$detail->price}}</p>
                                 </div>
                                 @if($order->delivery_status=='Accepted' || $order->delivery_status=='Pending')
                                 <div class="return-tag">
                                    <p> Return eligible Only Before Shipping</p>
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 mt-5 mb-5 your-order-sub-main">
                        <div class="your-order-sub">
                           @if($order->delivery_status=='Delivered')
                           @if($detail->status==0)
                           <div> <a href="{{url('return-items/'.$detail->id)}}"><button class="return-item">Return Item</button></a></div>
                           @endif
                           @endif
                           <div>  <a href="{{url('product-review/'.$detail->product_id)}}"><button class="product-review">Write Product Review</button></a></div>
                           @if($detail->status==1)
                           <div> <button class="reorder">Returned </button></div>
                           @endif
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- footar -->
      @include('front-end.include.footar')
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/sliderscroll.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script>
    function confirmCancel(event, url) {
        event.preventDefault(); // Prevent the default link action
        if (confirm("Are you sure you want to cancel this order?")) {
            window.location.href = url; // Redirect if confirmed
        }
    }
</script>
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
         // Select all dropdown boxes
         document.querySelectorAll('.dropdown-box').forEach(function (dropdownBox) {
           dropdownBox.addEventListener('click', function (event) {
             const dropdown = this.parentElement;
             dropdown.classList.toggle('active');
             
             // Prevent event bubbling to document
             event.stopPropagation();
           });
         });
         
         // Close all dropdowns if clicked outside
         document.addEventListener('click', function () {
           document.querySelectorAll('.dropdown-container').forEach(function (dropdown) {
             dropdown.classList.remove('active');
           });
         });
      </script>
   </body>
</html>