<!-- Navigasi -->
<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top shadow" data-aos="fade-down">
   <div class="container">
      <a href="{{ route('/')}}" class="navbar-brand">
         <img src="{{ url('/project/images/logo.svg') }}" class="mr-2" width="50px" alt="Adib Store" align="left">
         <p class="my-logo" style="margin-top: 8px !important;"> 
            ADIB STORY
         </p>
      </a>
      @auth
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
      @endauth
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile">
            <span class="navbar-toggler-icon"></span>
         </button>
      <div class="collapse navbar-collapse" id="navbarMobile">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item align-self-center px-1">
               <a class="nav-link {{ (request()->is('/*')) ? 'active' : '' }}" href="{{ route('/') }}">Home</a>
            </li>              
            <li class="nav-item align-self-center px-1">
               <a class="nav-link {{ (request()->is('categories*')) ? 'active' : '' }}" href="{{ route('category') }}">Categories</a>
            </li>                                
            <li class="nav-item align-self-center px-1">
               <a class="nav-link" href="{{ route('category') }}">Voucher</a>
            </li>                                
            <li class="nav-item align-self-center px-1">
               <a class="nav-link" href="#"></a>
            </li>  
            @guest
               <li class="nav-item align-self-center my-1 px-2">
                  <a href="{{ route('login') }}" class="nav-link" style="text-decoration:underline;">Sign in</a>
               </li>                                             
               <a href="{{ route('register') }}" target="_blank" class="btn my-bt-pro my-1 text-white" role="button">Sign up</a>                  
            @endguest
            @auth
                  <!-- Desktop -->
               <li class="nav-item dropdown align-self-center d-none d-lg-flex">
                  <a href="#" class="nav-link user-picture" id="navbarDropdown" role="button" data-toggle="dropdown" title="My name is a {{ Auth::user()->name }}">
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
                     <a class="dropdown-item mb-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                        Log out
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
               </li>
               <li class="nav-item align-self-center d-none d-lg-flex" title="View cart">
                  <a href="{{ route('cart') }}" class="nav-link d-inline-block pr-0">
                     @php
                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                     @endphp
                     @if ($carts > 0)
                        <img src="{{ url('project/images/cart.svg') }}" class="cart-mobile" alt="Keranjang">
                        <div class="cart-badge">{{ $carts }}</div>            
                     @else
                        <img src="{{ url('project/images/cart.svg') }}" class="cart-mobile" alt="Keranjang">                                    
                     @endif
                  </a>
               </li>
               <!-- Mobile -->            
               {{-- <li class="nav-item align-self-center d-block d-lg-none">
                  <a href="#" class="nav-link user-picture">
                     <img src="{{ url('/project/images/user/user-yayak.png') }}" width="45px" height="45px" class="mr-2" alt="">
                     <span>{{ Auth::user()->name }}</span>
                  </a>                  
               </li>  --}}
               <li class="nav-item dropdown align-self-center d-block d-lg-none">
                  <a href="#" class="nav-link user-picture" id="navbarDropdown" role="button" data-toggle="dropdown">
                     <img src="{{ url('/project/images/user/user-yayak.png') }}" width="45px" height="45px" class="mr-2" alt="">
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
                     <a class="dropdown-item mb-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                        Log out
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
               </li>
            @endauth
         </ul>         
      </div>
   </div>    
</nav>   
<!-- End Navigasi -->