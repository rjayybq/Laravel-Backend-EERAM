<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EERAM ADMIN PANEL</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/UDD LOGO.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center ">
          <a href="./index.html" style="margin-top: -30px; margin-left: 10px ">
            <img src="../assets/images/logos/EDU-EMER LOGO.ico" alt="" style="margin-left: 10px; margin-bottom: -30px " />
            <h5 class="text-center">Edu-Emergency Risk Assessment Monitoring System</h5>
          </a>
         
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('auth.home') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">POST MANAGEMENT</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('auth.announcements.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="material-symbols:post" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Show Announcements</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('auth.announcements.create') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="material-symbols:create-new-folder-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Create Announcements</span>
              </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu">ACCOUNT VERIFIED MANAGEMENT</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('auth.unverified-users') }}" aria-expanded="false">
                  <span>
                    <iconify-icon icon="line-md:account-alert-loop" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Unverified Accounts</span>
                </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('auth.verified') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="material-symbols:person-check-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Verified Accounts</span>
              </a>
          </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
             
              <li class="nav-item dropdown">
                
                <a class="nav-link nav-icon-hover ml-5" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                {{ Auth::user()->name }}
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">   
                      
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>