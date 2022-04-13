<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top shadow" data-aos="fade-down">
   <div class="container">
      <a href="{{ route('/') }}" class="navbar-brand">
         <img src="images/logo.png" class="mr-2" width="50px" alt="Adib Store" align="left">
         <p class="my-logo mb-0"> 
            ADIB STORY
         </p>
      </a>
      <!-- Mobile -->
      <a href="#" class="nav-link d-inline-block d-block d-lg-none ml-auto pr-2" title="View cart">
         <img src="images/cart.svg" class="cart-mobile" alt="Keranjang">
         <div class="cart-badge">9</div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMobile">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item align-self-center px-1">
                <a class="nav-link" href="{{ route('/') }}">Home</a>
            </li>               
            <li class="nav-item align-self-center px-1">
               <a class="nav-link" href="{{ route('category') }}">Categories</a>
            </li>                                   
            <li class="nav-item align-self-center px-1">
               <a class="nav-link" href="#">Voucher</a>
            </li>                                   
            <li class="nav-item align-self-center px-1">
               <a class="nav-link" href="#"></a>
            </li>                              
            <!-- Desktop -->
            <li class="nav-item dropdown align-self-center d-none d-lg-flex">
               <a href="#" class="nav-link user-picture" id="navbarDropdown" role="button" data-toggle="dropdown">
                  <img src="images/user/user-yayak.png" width="45px" height="45px" class="mr-2" alt="">
                  <span>Hi, Yayak</span>
               </a>
               <div class="dropdown-menu b-12">
                  <a href="dashboard.html" class="dropdown-item mt-1">
                     <ion-icon name="home-outline" class="mr-2"></ion-icon>
                     Dashboard
                  </a>
                  <a href="dashboard-account.html" class="dropdown-item">
                  <ion-icon name="Settings-outline" class="mr-2"></ion-icon>
                     Setting
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item mb-1">
                     <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                     Log out
                  </a>
               </div>
            </li>
            <li class="nav-item align-self-center d-none d-lg-flex" title="View cart">
               <a href="cart.html" class="nav-link d-inline-block">
                  <img src="images/cart.svg" alt="Keranjang">
                  <div class="cart-badge">9</div>
               </a>
            </li>
            <!-- Mobile -->            
            <li class="nav-item align-self-center d-block d-lg-none">
               <a href="#" class="nav-link user-picture">
                  <img src="images/user/user-yayak.png" width="45px" height="45px" class="mr-2" alt="">
                  <span>Hi, Yayak</span>
               </a>                  
            </li>                          
         </ul>                                     
      </div>
   </div>    
</nav>   