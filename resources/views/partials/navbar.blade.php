<div class="container-xxl position-relative p-0">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <a href="" class="navbar-brand p-0">
          <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>RestoKu</h1>
          <!-- <img src="img/logo.png" alt="Logo"> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
            <a href="menu" class="nav-item nav-link {{ Request::is('menu') ? 'active' : '' }}">Menu</a>
            <a href="contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            <a href="cart" class="nav-item nav-link {{ Request::is('cart') ? 'active' : '' }}">Cart</a>
            <a href="myorder" class="nav-item nav-link {{ Request::is('myorder') ? 'active' : '' }}">MyOrder</a>
        </div>
        @auth
        @php
          $username = Auth::user()->nama;
        @endphp
        <div class="dropdown">
          <a href="login" class="btn btn-primary py-2 px-4 dropdown-toggle" data-bs-toggle="dropdown">halo {{ $username }}</a>
          <div class="dropdown-menu m-0">    
            <a href="profile" class="dropdown-item">Profile</a>
            <form action="/logout" method="post">
              @csrf
              <button class="dropdown-item" type="submit">
                Log Out
              </button>
            </form>
          </div>
        </div>
        @else
        <a href="login" class="btn btn-primary py-2 px-4">Login</a>
        @endauth
          
      </div>
  </nav>
</div>