 <!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
         <a href="index.html">
             <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
             <h5 class="logo-text">Backend</h5>
         </a>
     </div>
     <ul class="sidebar-menu do-nicescrol">
         <li class="sidebar-header">MAIN NAVIGATION</li>
         <li>
             <a href="/h">
                 <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
             </a>
         </li>
         <li class="{{ Request::routeIs('user.*') ? 'active' : '' }}">
             <a href="{{ route('user.index') }}">
                 <i class="bi bi-people-fill"></i> <span>User</span>
             </a>
         </li>
         <li class="{{ Request::routeIs('product.*') ? 'active' : '' }}">
             <a href="{{ route('product.index') }}">
                 <i class="bi bi-fork-knife"></i><span>Product</span>
             </a>
         </li>
         <li class="{{ Request::routeIs('option.*') ? 'active' : '' }}">
             <a href="{{ route('option.index') }}">
                 <i class="bi bi-three-dots"></i><span>Option</span>
             </a>
         </li>
         <li class="{{ Request::routeIs('bill.*') ? 'active' : '' }}">
             <a href="{{ route('bill.index') }}">
                 <i class="bi bi-cash-stack"></i><span>Bill</span>
             </a>
         </li>
     </ul>

 </div>
 <!--End sidebar-wrapper-->
