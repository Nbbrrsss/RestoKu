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
            <a href="menukasir" class="nav-item nav-link {{ Request::is('menukasir') ? 'active' : '' }}">Menu</a>
            <a href="cartkasir" class="nav-item nav-link {{ Request::is('cartkasir') ? 'active' : '' }}">Cart</a>
            <a href="kasirorder" class="nav-item nav-link {{ Request::is('kasirorder') ? 'active' : '' }}">Orders</a>
            <a href="kasirriwayatorder" class="nav-item nav-link {{ Request::is('Riwayat') ? 'active' : '' }}">Riwayat</a>
        </div>
        @auth
        <div class="dropdown">
          <a href="login" class="btn btn-primary py-2 px-4 dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
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