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
  </head>

<body>
<div class="app">
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboard/dashboard.html">
          <h3>Doca.pets</h3>
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
              <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="far fa-house-flood text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
              <div class="collapse show" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item active">
                    <a href="../../pages/dashboard/dashboard.html" class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="far fa-sack-dollar text-green"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="../../pages/transaction/on-day.html" class="nav-link">On Day</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/transaction/booked.html" class="nav-link">Booked</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/transaction/expired.html" class="nav-link">Expired</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/transaction/finished.html" class="nav-link">Finished</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/transaction/approve-item.html" class="nav-link">Approve Item</a>
                  </li>
                </ul>
              </div>
            </li>


          </ul>
        </div><!-- /collapese -->
      </div><!-- /navbar-inner -->


    </div>
  </nav>

  <main class="py-4">
      @yield('content')
  </main>
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
