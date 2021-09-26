@extends('layout.admin')

@section('title','Dashboard')

@section('table-responsive')
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      @if (session('admin'))
          <div class="alert alert-success">
              {{ session('admin') }}
          </div>
      @endif
      <div style="padding-left: 60px" class="card-deck">
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div style="text-align: center;" class="card-header">Data Balita</div>
        <div class="card-body">
         <a style="text-align: center; padding-left: 70px;" class="text-white btn" href="{{url('/admin/lihat-balita')}}"><h4 class="card-title">{{$balita1[0]->hasil}} Balita <i style="
            width: 30px;
            height: 30px;" data-feather="trending-up"></i> </h4></a>
          <p style="text-align: center;" class="card-text">Balita yang terdata</p>
        </div>
      </div>
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div style="text-align: center;" class="card-header">Data Bidan</div>
        <div class="card-body">
          <a style="text-align: center; padding-left: 70px;" class="text-white btn" href="{{url('/admin/bidan')}}"><h4 style="text-align: center;" class="card-title">{{$bidan1[0]->hasil}} Bidan <i style="
            width: 30px;
            height: 30px;" data-feather="trending-up"></i> </h4></a>
          <p style="text-align: center;" class="card-text">Bidan yang terdata</p>
        </div>
      </div>
      <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
        <div style="text-align: center;" class="card-header">Data Kader</div>
        <div class="card-body">
          <a style="text-align: center; padding-left: 70px;" class="text-white btn" href="{{url('/admin/kader')}}"><h4 style="text-align: center;" class="card-title">{{$kader1[0]->hasil}} Kader <i style="
            width: 30px;
            height: 30px;" data-feather="trending-up"></i> </h4></a>
          <p style="text-align: center;" class="card-text">Kader yang terdata</p>
        </div>
      </div>
      </div>

@endsection