@extends('layout.admin')

@section('title','Tambah Data')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Pelayanan</h4>
      <form method="post" action="{{url('/admin/input-pelayanan')}}">

        @csrf
  <div class="form-group">
     <label>ID timbangan Balita</label>
      <select name="id_timbang" id="" class="form-control">
        @foreach ($penimbangan as $penimbangans)
      <option value="{{$penimbangans->id_penimbangan}}">{{$penimbangans->id_penimbangan}} - {{$penimbangans->nama}} - Berat Badan ({{$penimbangans->bb}}) - Tinggi Badan ({{$penimbangans->tb}})</option>
        @endforeach
      </select>
  </div>
  <div class="form-group">
    <label>Nama Balita</label>
    <select name="id_balita" id="" class="form-control">
      @foreach ($balita as $balitas)
      <option value="{{$balitas->id_balita}}">{{$balitas->nama}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Nama Bidan</label>
    <select name="id_bidan" id="" class="form-control">
      @foreach ($bidan as $bidans)
      <option value="{{$bidans->id_bidan}}">{{$bidans->nama_bidan}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Nama Kader</label>
    <select name="id_kader" id="" class="form-control">
      @foreach ($kader as $kaders)
      <option value="{{$kaders->id_kader}}">{{$kaders->nama_kader}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Tanggal Pelayanan</label>
    <div class="input-group mb-3 ">
    <div class="input-group-prepend">
      <select name="jadwal" id="" class="form-control">
        @foreach ($jadwal as $jadwals)
        <option value="{{$jadwals->id_jadwal}}">{{$jadwals->nama_kegiatan}} ( {{$jadwals->tgl_kegiatan}} )</option>
        @endforeach
      </select>
    </div>
    <input type="date" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Sidoarjo, 27 Januari 2021">
   	@error('tgl')
   		<div class="alert alert-danger">{{ $message }}</div>
   	@enderror
    </div>
  <div class="form-group">
    <label>Jenis Vitamin</label>
    <select name="vitamin" id="" class="form-control">
      @foreach ($imun as $imuns)
      <option value="{{$imuns->id_imun}}">Vitamin {{$imuns->imunisasi}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Jenis Imunisasi</label>
    <select name="vaksin" id="" class="form-control">
      @foreach ($vaksin as $vaksins)
      <option value="{{$vaksins->id_vaksin}}">{{$vaksins->vaksin}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Penyuluhan</label>
    <textarea class="form-control" name="penyuluhan" id="" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection