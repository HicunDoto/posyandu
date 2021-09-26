@extends('layout.user')

@section('title','Dashboard')

@section('table-responsive')
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }} "{{auth()->user()->email}}"
          </div>
      @endif
      @if (session('admin'))
          <div class="alert alert-success">
              {{ session('admin') }}
          </div>
      @endif<center>
      <div class="card" style="width: 30rem;">
        <div class="card-body">
		  <div class="row">
        <div class="col-lg-12 col-12 text-center">
          <div class="box box-body box-link-shadow text-center">
          <div class="box-body bg-primary">
            <p>
              <span style="
               width: 50px;
               height: 50px;" data-feather="user"></span>
            </p>
          </div>
          <img style="padding-bottom: 20px" width="200" height="200" src="../../balita.jpg" alt="Card image cap">
            <table class="table" width="30%">
            <tr>
            <td>Nama</td><td>{{$balita->nama}}</td></tr>
            <tr><td>Tempat, Tanggal Lahir</td><td>{{$balita->tempat}}, {{$balita->tl}}</td></tr>
            <tr><td>Jenis Kelamin</td><td>@if ($balita->jenis=="1")
              Laki-laki
            @else
              Perempuan
            @endif</td></tr>
            <tr><td>Nama Ibu</td><td>{{$balita->ibu}}</td></tr>
            <tr><td>Nama Ayah</td><td>{{$balita->ayah}}</td></tr>
            <tr><td>Anak ke</td><td>{{$balita->anakke}}</td></tr>
            <tr><td>Alamat</td><td>{{$balita->alamat}}</td></tr>
            </table>
          </div>
        </div>

        </center></div>
        </div>
      </div>
@endsection