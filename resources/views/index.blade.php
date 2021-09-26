<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Informasi Posyandu</title>
        <link rel="icon" type="image/x-icon" href="assets/img/ipad.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Home</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Kontak</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/login')}}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Sistem Informasi Posyandu</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5" style="font-size: 19px;">Sebuah platform informasi @foreach ($posyandu as $yoi)
                        {{$yoi->posyandu}}
                      @endforeach</h2>
                    <a class="btn btn-primary js-scroll-trigger" href="#about">Mulai</a>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 style="padding-left: 159px" class="text-white mb-4">Tentang Posyandu</h2>
                            <table>
                                <td><p class="text-white-50"><img class="img-fluid" src="assets/img/ipad.png" width="546" height="1000" alt="" /></p></td>
                                <td><p class="text-white-50">Sistem informasi pelayanan <b style="color: #63cece">posyandu</b> yang diharapkan bisa untuk membantu proses pelaksanaan dari <b style="color: #63cece">posyandu</b> yang meliputi proses pencatatan hasil <b style="color: #63cece">posyandu</b>, dan penyimpanan arsip laporan perkembangan balita. </p></td>
                            </table>
                        <p class="text-white-50">
                            <a class="btn btn-outline-primary btn-sm js-scroll-trigger" href="/login">Tertarik?</a>
                        </p>
                    </div>
                </div>
                {{--  --}}
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container">
                <!-- Featured Project Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7"><div class="table-responsive">
                        <table class="table">
                             <thead class="thead">
                               <tr>
                                 <th style="text-align: center;" scope="col">No</th>
                                 <th style="text-align: center;" scope="col">Tanggal Kegiatan</th>
                                 <th style="text-align: center;" scope="col">Kegiatan</th>
                               </tr>
                             </thead>
                             <tbody>
                               @foreach ($jadwal as $jadwals)
                               <tr>
                                 <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
                                 <td style="text-align: center;">{{Carbon::parse($jadwals->tgl_kegiatan)->formatLocalized('%A, %d %B %Y')}}</td>
                                 <td style="text-align: center;">{{$jadwals->nama_kegiatan}}</td>
                               </tr>
                               @endforeach
                             </tbody>
                       </table>
                         </div></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Jadwal Kegiatan</h4>
                            <p class="text-black-50 mb-0">
                                Mari memantau perkembangan si balita
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
             </div>
        </section>
        <!-- Signup-->
 
        <!-- Contact-->
        <section class="contact-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Alamat</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">Desa.Prasung Rt.02 Rw.01</div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7912.746150574268!2d112.74816572239975!3d-7.423899889645018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e428eabd6a91%3A0x399ded14efc343b!2sKepuhsari%2C%20Prasung%2C%20Kec.%20Buduran%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1620792420284!5m2!1sid!2sid" width="100%" height="100" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="#!">Danangfirmansyah98@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+62 857-3377-8832</div>
                            </div>
                        </div>
                    </div> 
                </div><br><br><br><br>
                <div class="footer small text-center text-white-50"><div class="container">Copyright ©Danangff 2021</div>
            </div>
        </section>
        <!-- Footer-->
        <!-- <footer class="footer small text-center text-white-50"><div class="container">Copyright ©Danangff 2021</div></footer> -->
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
            (function () {
                'use strict'
                feather.replace()
  
             })()
  
          </script>
    </body>
</html>
