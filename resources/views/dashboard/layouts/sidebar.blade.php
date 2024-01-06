<div class="nav">
    <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
      </a>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Product
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product">Products List</a>
            <a class="nav-link {{ Request::is('newproduct') ? 'active' : '' }}" href="/newproduct">Add New Product</a>
        </nav>
      </div>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
          Order
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
          <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="/order">Order List</a>
        </nav>
      </div>
    <div class="sb-sidenav-menu-heading">System</div>
      <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#pagesCollapseUsers" aria-expanded="false" aria-controls="pagesCollapseUsers">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
          Users
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="pagesCollapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link {{ Request::is('userlist') ? 'active' : '' }}" href="/userlist">Users List</a>
        </nav>
      </div>
      <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
        <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
          Authentications
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
        <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="/login">Login</a>
          <a class="nav-link" href="/register">Register</a>
        </nav>
      </div>
  </div>