<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="manifest" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="assets/img/ipad.ico">
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
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Sistem Informasi Posyandu</a>
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
            <h6 class="nav-link">@foreach ($posyandu as $yoi)
              {{$yoi->posyandu}}
            @endforeach</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}">
              <span data-feather="home"></span>
              Dashboard <span class=""></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/posyandu')}}">
              <span data-feather="file-plus"></span>
              Form Posyandu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/bidan')}}">
              <span data-feather="file-plus"></span>
              Bidan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/kader')}}">
              <span data-feather="file-plus"></span>
              Kader
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/input-akun')}}">
              <span data-feather="file-plus"></span>
              Pendaftaran Balita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/vaksinasi')}}">
              <span data-feather="file-plus"></span>
              Vaksinasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/imunisasi')}}">
              <span data-feather="file-plus"></span>
              Vitamin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/jadwal')}}">
              <span data-feather="calendar"></span>
              Jadwal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/timbang')}}">
              <span data-feather="monitor"></span>
              Penimbangan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/pelayanan')}}">
              <span data-feather="book-open"></span>
              Pelayanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/laporan')}}">
              <span data-feather="activity"></span>
              Laporan Posyandu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/laporan-bidan')}}">
              <span data-feather="activity"></span>
              Laporan Bidan
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

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
@stack('script')
      <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script>
    $(document).ready(function() { $('#example').DataTable(); } );
  </script>
<script>
  $(".delete").on("submit", function(){
      return confirm("Apakah kamu yakin ingin menghapus data ini?");
  });
</script>
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

</body>
</html>
