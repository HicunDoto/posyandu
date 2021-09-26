<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="manifest" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" type="image/x-icon" href="assets/img/ipad.ico" />
<meta name="msapplication-config" content="https://getbootstrap.com/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<title>@yield('title')</title>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{url('/dashboard')}}">Sistem Informasi Posyandu</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{url('/logout')}}">Keluar</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <h6 class="nav-link">Posyandu Kemuning I</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
              <span data-feather="home"></span>
              Dashboard <span class=""></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard/imunisasi')}}">
              <span data-feather="droplet"></span>
              Vitamin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard/vaksinasi')}}">
              <span data-feather="thermometer"></span>
              Vaksinasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard/laporan')}}">
              <span data-feather="activity"></span>
              Kms
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      </div>
   @yield('table-responsive')
    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@stack('script')
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script>
$(window).on('load', function () {
    event.preventDefault();
    var id = $(this).attr('href');
    $('#show').modal();
});
  </script>
        <script>
          (function () {
  'use strict'

  feather.replace()

})()

        </script>
        <script type="text/javascript">
          function countdown(seconds) {
        seconds = parseInt(sessionStorage.getItem("seconds"))||seconds;
        var timerz = window.setInterval(function() {
            function tick() {
              seconds--; 
              sessionStorage.setItem("seconds", seconds)
              var counter = $('#timer');
              var current_hours = parseInt(seconds/60/60);
              var current_minutes = parseInt(seconds/60) % 60;
              var current_seconds = seconds % 60;
              counter.html((current_hours < 10 ? "0" : "") + current_hours +":"+ (current_minutes < 10 ? "0" : "") + current_minutes + ":" + (current_seconds < 10 ? "0" : "") + current_seconds);
              //counter.html(current_minutes + ":" + (current_seconds < 10 ? "0" : "") + current_seconds);
              $('#hicun').val($('#timer').html());
              if( seconds < 0 ) {
                //alert('waktu habis');
                window.clearInterval(timerz);
                $('#timer').html("Waktu Habis!");
                $('#hicun').val($('#timer').html());
                $('#flag').attr('disabled', true);
              } 
            }
        tick();
        }, 1000);
      }
      var a = document.getElementById("waktu").value;
      countdown(a);
        </script>
</body>
</html>
