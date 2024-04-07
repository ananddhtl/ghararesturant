 <!-- Spinner Start -->
 <div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-border text-primary" role="status"></div>
 </div>
 <!-- Spinner End -->


 <!-- Navbar Start -->
 <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(15, 23, 43, 0.8), rgba(15, 23, 43, 0.8));">
     <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
         <div class="col-lg-6 px-5 text-start">

             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Location')
                     <small><i class="fa fa-map-marker-alt me-2"></i>{{ $set->siteValue }}</small>
                 @endif
             @endforeach
             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Email')
                     <small class="ms-4"><i class="fa fa-envelope me-2"></i><a
                             href="mailto:{{ $set->siteValue }}">{{ $set->siteValue }}</a></small>
                 @endif
             @endforeach
         </div>
         <div class="col-lg-6 px-5 text-end">
             <small>Follow us:</small>
             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Facebook')
                     <a class="text-body ms-3" href="{{ $set->siteValue }}"><i class="fab fa-facebook-f"></i></a>
                 @endif
             @endforeach
             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Twitter')
                     <a class="text-body ms-3" href="{{ $set->siteValue }}"><i class="fab fa-twitter"></i></a>
                 @endif
             @endforeach
             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Youtube')
                     <a class="text-body ms-3" href="{{ $set->siteValue }}"><i class="fab fa-youtube"></i></a>
                 @endif
             @endforeach
             @foreach ($settings as $set)
                 @if ($set->siteKey == 'Instagram')
                     <a class="text-body ms-3" href="{{ $set->siteValue }}"><i class="fab fa-instagram"></i></a>
                 @endif
             @endforeach
         </div>
     </div>

     <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
         <a href="/" class="navbar-brand ms-4 ms-lg-0">

             @foreach ($settings as $set)
                 @if ($set->siteKey == 'ResturantName')
                     <h1 class="fw-bold text-primary m-0">{{ $set->siteValue }}</h1>
                 @endif
             @endforeach
         </a>
         <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto p-4 p-lg-0">
                 <a href="{{ route('/') }}"
                     class="nav-item nav-link {{ request()->is('/') ? ' active' : '' }}">Home</a>
                 <a href="{{ route('about') }}"
                     class="nav-item nav-link {{ request()->is('about') ? ' active' : '' }}">About Us</a>
                 <a href="{{ route('menu') }}"
                     class="nav-item nav-link {{ request()->is('menu') ? ' active' : '' }}">Menu</a>
                 <div class="nav-item dropdown">
                     <a href="#"
                         class="nav-link dropdown-toggle {{ request()->is('booking', 'team', 'testimonial') ? ' active' : '' }}"
                         data-bs-toggle="dropdown">Pages</a>
                     <div class="dropdown-menu m-0">
                         <a href="{{ route('booking') }}" class="dropdown-item">Bookings</a>
                         <a href="{{ route('team') }}" class="dropdown-item">Our Team</a>
                         <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                     </div>
                 </div>
                 <a href="{{ route('contact') }}"
                     class="nav-item nav-link {{ request()->is('contact') ? ' active' : '' }}">Contact Us</a>
             </div>
             <div class="d-none d-lg-flex ms-2">
                 @if (auth()->check())
                     <div class="nav-item dropdown">
                         <a href="/user-info" class="btn btn-primary py-2 px-4">
                             <i class="fa-solid fa-user"></i>
                             <span>{{ Str::limit(auth()->user()->name, 10) }}
                             </span>
                         </a>
                         <div class="dropdown-menu m-0">
                             @if (Auth::check() && Auth::user()->role != 0)
                                 <a href="/admin/" class="dropdown-item">Dashboard</a>
                             @endif
                             <a href="/user-info" class="dropdown-item">User-info</a>
                             <a href="/booked-table" class="dropdown-item">Booked table</a>
                             <a href="/order" class="dropdown-item">Orders</a>
                             <a onclick="document.getElementById('logout-form').submit()" href="#"
                                 class="dropdown-item">logout</a>
                             <form action="{{ route('logout') }}" id="logout-form" method="post">
                                 @csrf
                             </form>

                         </div>
                     </div>
                 @else
                     <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4">Log In</a>
                 @endif
                 <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('cart') }}">
                     <small class="fa fa-shopping-bag text-body"></small>
                 </a>
             </div>
         </div>
     </nav>
 </div>
 <!-- Navbar End -->
