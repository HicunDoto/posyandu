@extends('layout.admin')

@section('title','Edit Data Penimbangan')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Penimbangan</h4>
      <form method="post" action="/admin/detail-timbang/{{$timbang->id_penimbangan}}">
        @method('put')
      	@csrf
          <div class="form-group">
            <label>Nama Balita</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$timbang->id_balita}} - {{$timbang->nama}}</span>
            </div>
            <select name="id_balita" id="" class="form-control">
            @foreach ($balita as $balitas)
              <option value="{{$balitas->id_balita}}">{{$balitas->nama}}</option>
            @endforeach
            </select>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Bidan</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$timbang->id_bidan}} - {{$timbang->nama_bidan}}</span>
            </div>
            <select name="id_bidan" id="" class="form-control">
            @foreach ($bidan as $bidans)
              <option value="{{$bidans->id_bidan}}">{{$bidans->nama_bidan}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
              <label>Nama Kader</label>
              <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$timbang->id_kader}} - {{$timbang->nama_kader}}</span>
                </div>
              <select name="id_kader" id="" class="form-control">
              @foreach ($kader as $kaders)
                <option value="{{$kaders->id_kader}}">{{$kaders->nama_kader}}</option>
              @endforeach
              </select>
              </div>
          <div class="form-group">
            <label>Tanggal Penimbangan</label>
            <input type="date" name="tgl" value="{{ $timbang->tgl_timbang }}" class="form-control @error('tgl') is-invalid @enderror">
               @error('tgl')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
          </div>
          <div class="form-group">
            <label>Berat Timbangan</label>
            <div class="input-group mb-3 ">
            <input type="text" name="bb" value="{{ $timbang->bb }}" class=" form-control @error('bb') is-invalid @enderror" placeholder="6">
               @error('clue')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">kg</span>
            </div>
            </div>
          </div>
          <div class="form-group">
            <label>Tinggi Pengukuran</label>
            <div class="input-group mb-3 ">
            <input type="text" name="tt" value="{{ $timbang->tb }}" class=" form-control @error('tt') is-invalid @enderror" placeholder="60">
               @error('tt')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">cm</span>
            </div>
            </div>
          </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection