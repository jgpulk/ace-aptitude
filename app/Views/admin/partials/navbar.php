<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
<button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>

    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="#">Admin - Ace Aptitude</a>

    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Navbar Search Dropdown - Note: Visible only below the lg breakpoint -->
        <li class="nav-item dropdown no-caret me-3 d-lg-none">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
        </li>

        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">Admin</div>
                        <div class="dropdown-user-details-email">admin@gmail.com</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('admin/logout') ?>">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>