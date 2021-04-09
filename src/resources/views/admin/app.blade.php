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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet" />

    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
              <a class="nav-link" href="{{url('/')}}">
                <i class="far fa-door-open"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                  class="nav-link {{Route::currentRouteName() == 'admin.listdoctor' ? 'active': ''}}"
                  href="{{url('/admin/list-doctor')}}">
                <i class="far fa-user-md"></i>
                <span class="nav-link-text">List Dokter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{str_contains(Route::currentRouteName(),'pet') ? 'active' : ''}}" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="{{str_contains(Route::currentRouteName(),'pet') ? 'true' : 'false'}}" aria-controls="navbar-dashboards">
                <i class="far fa-paw"></i>
                <span class="nav-link-text">Hewan</span>
              </a>
              <div class="collapse {{str_contains(Route::currentRouteName(),'pet') ? 'show' : ''}}" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item {{Route::currentRouteName() == 'admin.addpet' ? 'active': ''}}">
                    <a href="{{url('/admin/add-pet')}}" class="nav-link">Tambah Hewan</a>
                  </li>
                  <li class="nav-item {{Route::currentRouteName() == 'admin.allpet' ? 'active': ''}}">
                    <a href="{{url('/admin/all-pet')}}" class="nav-link">Kelola Hewan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link {{str_contains(Route::currentRouteName(),'news') ? 'active' : ''}}" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="{{str_contains(Route::currentRouteName(),'news') ? 'true' : 'false'}}" aria-controls="navbar-examples">
                <i class="far fa-newspaper"></i>
                <span class="nav-link-text">Berita</span>
              </a>
              <div class="collapse {{str_contains(Route::currentRouteName(),'news') ? 'show' : ''}}" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item {{Route::currentRouteName() == 'admin.addnews' ? 'active': ''}}">
                    <a href="{{url('/admin/add-news')}}" class="nav-link">Tambah Berita</a>
                  </li>
                  <li class="nav-item {{Route::currentRouteName() == 'admin.allnews' ? 'active': ''}}">
                    <a href="{{url('/admin/all-news')}}" class="nav-link">Kelola Berita</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link {{str_contains(Route::currentRouteName(),'treat') ? 'active' : ''}}" href="#navbar-hewan" data-toggle="collapse" role="button" aria-expanded="{{str_contains(Route::currentRouteName(),'treat') ? 'true' : 'false'}}" aria-controls="navbar-hewan">
                <i class="far fa-heartbeat"></i>
                <span class="nav-link-text">Merawat</span>
              </a>
              <div class="collapse {{str_contains(Route::currentRouteName(),'treat') ? 'show' : ''}}" id="navbar-hewan">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item {{Route::currentRouteName() == 'admin.addtreat' ? 'active': ''}}">
                    <a href="{{url('/admin/add-treat')}}" class="nav-link">Tambah Cara Merawat</a>
                  </li>
                  <li class="nav-item {{Route::currentRouteName() == 'admin.alltreat' ? 'active': ''}}">
                    <a href="{{url('/admin/all-treat')}}" class="nav-link">Kelola Cara Merawat</a>
                  </li>
                </ul>
              </div>
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
                    <img alt="Image placeholder" src="{{asset('storage/avatar/'.Auth::user()->avatar)}}">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ ucfirst(Auth::user()->name) }}</span>
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
      @yield('content')
    </main>

  </div><!-- /main-content -->
</div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('js/cookie.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  @include('sweetalert::alert')
</body>
</html>
