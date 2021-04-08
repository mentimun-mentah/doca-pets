<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>DOCA PETS</title>
    <link rel="icon" href="{{asset('storage/logo.png')}}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap"
      rel="stylesheet"
    />

    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <!-- Argon CSS -->
    <link rel="stylesheet" href="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/css%2Fstyle.min.css?alt=media&token=e9d9401b-2d1f-4961-a937-102102d1723a" type="text/css">

    <style>
      .navbar-vertical.navbar-expand-xs .navbar-nav>.nav-item>.nav-link.active {
        background: #a5a5a533;
      }
    </style>
  </head>

<body>
<div class="app">

  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a href="/" class="navbar-brand" style="font-family: 'Dela Gothic One', cursive; color:#172b4d;" >
          <span class="va-sub ml-2">Doca.pets</span>
        </a>

        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
        <!-- /ml-auto -->
      </div>
      <!-- /sidenav-header -->

      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-house-flood"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-door-open"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-users"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-newspaper"></i>
                <span class="nav-link-text">Tambah Berita</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="far fa-paw"></i>
                <span class="nav-link-text">Tambah Hewan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-heartbeat"></i>
                <span class="nav-link-text">Tambah Cara Merawat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-clipboard-list-check"></i>
                <span class="nav-link-text">Kelola Berita</span>
              </a>
            </li>
          </ul>
          <!-- Nav items -->
        </div><!-- /collapese -->
      </div><!-- /navbar-inner -->

    </div>
  </nav><!-- /sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="far fa-search"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item">
              <a class="nav-link pr-0" href="#" role="button">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    <main>
      <admin></admin>
      @yield('content')
    </main>

  </div><!-- /main-content -->
</div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fjquery.min.js?alt=media&token=22b03222-92e2-476a-b3d9-c541d5253486"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fbootstrap.bundle.min.js?alt=media&token=2ea57960-a8e2-4289-be33-319efef320f4"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fjs.cookie.js?alt=media&token=e891f5a6-a2e2-4b11-9873-bc54403c2969"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fjquery.scrollbar.min.js?alt=media&token=6870eefd-f25e-406a-b613-70f8ce7037e8"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fjquery-scrollLock.min.js?alt=media&token=e1f7502f-0917-487f-bf84-567016ee45d4"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2FChart.min.js?alt=media&token=a2233783-b253-475c-9ec8-cf82ef76483b"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2FChart.extension.js?alt=media&token=ee54af9d-dec6-4429-a1a0-68b282618ea1"></script>
  <script src="https://firebasestorage.googleapis.com/v0/b/admin-dashboard-pro.appspot.com/o/js%2Fadmin.min.js?alt=media&token=6881a060-7ee0-4d15-a71d-7ddb701dbe62"></script>


</body>
</html>
