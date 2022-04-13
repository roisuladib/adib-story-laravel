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
                     <img src="{{ url('/project/images/logo.svg')}}" class="my-4" width="96px" height="96px" alt="Adib Story" />
                  </a>
               </div>
               <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
               <a href="{{ route('my-product') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/my-products*')) ? 'active' : '' }}">Products</a>               
               <a href="{{ route('transaction') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}">Transactions</a>
               <a href="{{ route('account') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/my-account*')) ? 'active' : '' }}">Account</a>
               <a href="{{ route('setting') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/settings*')) ? 'active' : '' }}">Settings</a>
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
                  <a href="{{ route('cart') }}" class="nav-link d-inline-block d-block d-lg-none ml-auto pr-2" title="View cart">
                     @php
                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                     @endphp
                     @if ($carts > 0)
                        <img src="{{ url('/project/images/cart.svg') }}" class="cart-mobile" alt="Keranjang">
                        <div class="cart-badge">{{ $carts }}</div>            
                     @else
                        <img src="{{ url('/project/images/cart.svg') }}" class="cart-mobile" alt="Keranjang">
                     @endif
                  </a>
                  <ul class="navbar-nav d-block d-lg-none">                        
                     <li class="nav-item align-self-center">
                        <a href="#" class="nav-link user-picture" title="My profile is a {{ Auth::user()->name }}"> 
                           <img src="https://ui-avatars.com/api/?background=5b49cf&color=fff&name={{ Auth::user()->name }}" width="45px" height="45px" class="rounded-circle" alt="Profile">                          
                        </a>                  
                     </li>                          
                  </ul>                  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav d-none d-lg-flex ml-auto">                                                      
                        <!-- Desktop --> 
                        <li class="nav-item dropdown align-self-center">
                           <a href="#" class="nav-link user-picture" id="navbarDropdown" role="button" data-toggle="dropdown" title="My profile is a {{ Auth::user()->name }}">
                              <img src="https://ui-avatars.com/api/?background=5b49cf&color=fff&name={{ Auth::user()->name }}" width="45px" height="45px" class="mr-2 rounded-circle" alt="Profile">
                              <span>{{ Auth::user()->name }}</span>
                           </a>
                           <div class="dropdown-menu b-12">
                              <a href="{{ route('dashboard') }}" class="dropdown-item mt-1">
                                 <ion-icon name="home-outline" class="mr-2"></ion-icon>
                                 Dashboard
                              </a>
                              <a href="{{ route('setting') }}" class="dropdown-item">
                              <ion-icon name="Settings-outline" class="mr-2"></ion-icon>
                                 Setting
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="{{ route('logout' ) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item mb-1">
                                 <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                                 Log out
                              </a>
                           </div>
                        </li>
                        <li class="nav-item align-self-center" title="View cart">
                           <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                              @php
                                 $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                              @endphp
                              @if ($carts > 0)
                                 <img src="{{ url('/project/images/cart.svg') }}" alt="Keranjang">
                                 <div class="cart-badge">{{ $carts }}</div>            
                              @else
                                 <img src="{{ url('/project/images/cart.svg') }}" alt="Keranjang">
                              @endif
                           </a>                           
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
   @stack('addon-script') 
</body>
</html>