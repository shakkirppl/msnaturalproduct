<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

@if(Auth::user()->role_id==1)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#masters" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Blog </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masters">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('video-gallary')}}"> Video Gallary</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('testimonial')}}"> Testimonial</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('about-us-images')}}"> About-Us Images</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('news-letter')}}"> News Letter</a></li>
            </ul>
            </div>
            
     
          </li>

              

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product_master" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Product Master </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product_master">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('products')}}">Products</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('stock_returns')}}">Stock Return</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('damages')}}">Damage</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('product-prices')}}">Product Price</a></li>
              </ul>
            </div>
            
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#production" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Production </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="production">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('work-center')}}">Work Center</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('bom/list')}}">BOM</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('production/list')}}">Production</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('shift')}}">Shift</a></li>
              </ul>
            </div>
            
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stock_transactions" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Stock Transactions </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stock_transactions">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('transfers/create')}}">Stock Transafer</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('stock_returns')}}">Stock Return</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('damages')}}">Damage</a></li>

              </ul>
            </div>
            
     
          </li>
    
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Review </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="review">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-pending')}}">Pending</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-active')}}">Active</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('review-block')}}">Blocked</a></li>

              </ul>
            </div>
            
     
          </li>
                 
@endif
    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('orders/tracking')}}">Order Tracking</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('pending-orders')}}">Pending Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('accepted-orders')}}">Accepted Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('packed-orders')}}">Packed Orders</a></li>
                 <li class="nav-item"> <a class="nav-link" href="{{URL::to('delivered-orders')}}">Delivered Orders</a></li>
                 </ul>
            </div>
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaction" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">Transaction </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('canceled-order')}}"> Canceld Order</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('return-items-pending')}}"> Return Items</a></li>
              </ul>
            </div>
            
     
          </li>

          @if(Auth::user()->store_id==3)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#oman_orders" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Oman Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="oman_orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('oman-pending-orders')}}">Pending Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('oman-accepted-orders')}}">Accepted Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('oman-packed-orders')}}">Packed Orders</a></li>
                 <li class="nav-item"> <a class="nav-link" href="{{URL::to('oman-delivered-orders')}}">Delivered Orders</a></li>
                 </ul>
            </div>
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#baharian_orders" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Bahrain  Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="baharian_orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('bahrain-pending-orders')}}">Pending Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('bahrain-accepted-orders')}}">Accepted Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('bahrain-packed-orders')}}">Packed Orders</a></li>
                 <li class="nav-item"> <a class="nav-link" href="{{URL::to('bahrain-delivered-orders')}}">Delivered Orders</a></li>
                 </ul>
            </div>
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#couriar" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Couriar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="couriar">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('courier-template-uae')}}">UAE</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('courier-template-oman')}}">Oman</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('courier-template-bahrain')}}">Bahrain</a></li>
                 </ul>
            </div>
     
          </li>

          
@endif
                 <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaction" aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-group menu-icon"></i> 
              <span class="menu-title">WhatsApp Order </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction">
              <ul class="nav flex-column sub-menu">
       
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('whatsapp-order/list')}}"> Whatsapp Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('whatsapp-customer/add_customer')}}"> New Customer</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('whatsapp-customers')}}">  Customers List</a></li>
              </ul>
            </div>
            
     
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visit_report" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Visit Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="visit_report">
              <ul class="nav flex-column sub-menu">
              <!-- <li class="nav-item"> <a class="nav-link" href="{{URL::to('last-visit')}}">Last Visit </a></li> -->
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('visit-analytics')}}">Visit Analytics </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('visit-by-country')}}">Visit By Country </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('most-visit')}}">Most Visit </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('day-visit')}}">Day Visit </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('date-wise-visit')}}">Date Wise Visit </a></li>
              </ul>
            </div>
            
     
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product_master" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Sales Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product_master">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('sales-report/date-wise')}}">Date Wise</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('sales-report/product-wise')}}">Product Wise</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('sales-report/country-wise')}}">Country Wise </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('sales-report/area-wise')}}">Area Wise </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('reports/most-moving')}}">Most Moving </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('reports/least-moving')}}">Least Moving </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('whatsapp-order/report')}}">Whatsapp Order </a></li>
              </ul>
            </div>
            
     
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#re_purchase_report" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Re Purchase Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="re_purchase_report">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('most-repurchased-customers')}}">Customer List</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{URL::to('most-repurchased-products')}}">Product List</a></li>
             
              </ul>
            </div>
            
     
          </li>
         
        </ul>
      </nav>