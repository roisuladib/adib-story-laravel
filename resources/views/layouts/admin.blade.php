<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
   <meta name="description" content="Adib Store" />
   <meta name="keywords" content="Belanja online murah, adibstore" />
   <meta name="author" content="Muhammad Roisul Adib" />
   <title>Adib Story | @yield('title')</title>
   <link rel="shortcut icon" href="{{ url('/project/images/logo.svg') }}" type="image/png">   
   @stack('prepent-style')
   @include('includes.style')
   <link rel="stylesheet" type="text/css" href="{{ url('/project/vendor/DataTables/datatables.min.css') }}" />
   @stack('addon-style')
</head>
<body>
   <div class="page-dashboard">
      <div class="d-flex" id="wrapper">
         <!-- Sidebar -->
         <div class="border-right" id="sidebar-wrapper" data-aos="fade-right">
            <div class="list-group list-group-flush">
               <div class="sidebar-heading text-center">
                  <a href="{{ route('/') }}" target="_blank">
                     <img src="{{ url('/project/images/icon-admin.png')}}" class="my-4" width="96px" height="96px" alt="Adib Story" />
                  </a>
               </div>
               <a href="{{ route('dashboard-admin') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">Dashboard</a>
               {{-- <a href="{{ route('banners.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/banners*')) ? 'active' : '' }}">Banners</a>                --}}
               <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/users*')) ? 'active' : '' }}">Users</a>               
               <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/categories*')) ? 'active' : '' }}">Categories</a>               
               <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/products*')) ? 'active' : '' }}">Products</a>               
               <a href="{{ route('product-galleries.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product-galleries*')) ? 'active' : '' }}">Galleries</a>               
               <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/transactions*')) ? 'active' : '' }}">Transactions</a>                      
               <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action">Sign out</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </div>
         </div>
         <div id="page-content-wrapper">
            <!-- TopBar -->
            <nav class="navbar navbar-expand-lg navbar-store fixed-top" data-aos="fade-down">
               <div class="container-fluid">                  
                  <!-- Mobile -->
                  <button class="btn my-bt-pro d-md-none mr-auto" id="menu-toggle">
                     &Lang;
                  </button>                 
                  <ul class="navbar-nav d-block d-lg-none">                        
                     <li class="nav-item align-self-center">
                        <a href="#" class="nav-link user-picture">
                           <img src="{{ url('/project/images/user/user-yayak.png') }}" width="45px" height="45px" alt="">                          
                        </a>                  
                     </li>                          
                  </ul>                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav d-none d-lg-flex ml-auto">                                                      
                        <!-- Desktop --> 
                        <li class="nav-item dropdown align-self-center">
                           <a href="#" class="nav-link user-picture" id="navbarDropdown" role="button" data-toggle="dropdown">
                              <img src="{{ url('/project/images/user/user-yayak.png') }}" width="45px" height="45px" class="mr-2" alt="">
                              {{-- <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" width="45px" height="45px" class="mr-2" alt="">                               --}}
                              <span>Hi, {{ Auth::user()->name }}</span>
                           </a>
                           <div class="dropdown-menu b-12">                                                      
                              <a href="{{ route('logout' )}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item mb-1">
                                 <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                                 Log out
                              </a>
                           </div>
                        </li>                                               
                     </ul>                                                          
                  </div>
               </div>    
            </nav>    
            
            {{-- Content --}}
            @yield('page-content-dashboard')

         </div>
      </div>
   </div>

   @stack('prepent-script')
   @include('includes.script')
   <script>
      const menuToggle = document.querySelector('#menu-toggle'),
      wrapper = document.querySelector('#wrapper');
      menuToggle.addEventListener('click', function (e) {
         wrapper.classList.toggle('toggled');
         e.preventDefault();
      });            
   </script>
   <script type="text/javascript" src="{{ url('/project/vendor/DataTables/datatables.min.js') }}"></script>
   @stack('addon-script') 
</body>
</html>