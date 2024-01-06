<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - RestoKu</title>
        <!-- -->
        
        <link href="{{ asset('css/dashboard/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed"> 
      <!-- Navbar-->
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-between">
        <!-- Navbar Brand-->
          <a class="navbar-brand ps-3 pe-5" href="/dashboard">RestoKu | Dashboard<button class="btn btn-link btn-sm ms-5 order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button></a>
        <!-- Sidebar Toggle-->
          <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><hr class="dropdown-divider" /></li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit">
                    Log Out
                  </button>
                </form>
              </ul>
            </li>
          </ul> 
      </nav>
      <!-- Navbar-->
      <!-- Side Navbar--> 
        <div id="layoutSidenav">
          <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
              <div class="sb-sidenav-menu">
                <!-- Side Navbar-->
                @include('dashboard.layouts.sidebar')
                <!-- Side Navbar-->  
              </div>
              @auth
                @php
                    $username = Auth::user()->nama; 
                    @endphp
                    <div class="sb-sidenav-footer">
                      <div class="small">Selamat Datang Kembali:</div>
                      {{ $username }}
                    </div>
             @endauth
              
            </nav>
          </div>
          <!--Content-->
          <div id="layoutSidenav_content">
            <!--Content-->
            @yield('container')
            <!--Content-->
            <footer class="py-4 bg-light mt-auto">
              <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                      <a href="#">Privacy Policy</a>
                      &middot;
                      <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
              </div>
            </footer>
          </div>
        </div>
        <!--Content-->
        <!-- --> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('css/dashboard/js/scripts.js') }}"></script>
        
    </body>
</html>
