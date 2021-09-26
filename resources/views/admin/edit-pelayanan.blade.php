@extends('layout.admin')

@section('title','Edit Data Pelayanan')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Pelayanan</h4>
      <form method="post" action="/admin/detail-pelayanan/{{$pelayanan->id_pelayanan}}">
        @method('put')
      	@csrf
          <div class="form-group">
            <label>Nama Balita</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$pelayanan->id_balita}} - {{$pelayanan->nama}}</span>
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
                <span class="input-group-text" id="basic-addon1">{{$pelayanan->id_bidan}} - {{$pelayanan->nama_bidan}}</span>
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
                    <span class="input-group-text" id="basic-addon1">{{$pelayanan->id_kader}} - {{$pelayanan->nama_kader}}</span>
                </div>
              <select name="id_kader" id="" class="form-control">
              @foreach ($kader as $kaders)
                <option value="{{$kaders->id_kader}}">{{$kaders->nama_kader}}</option>
              @endforeach
              </select>
              </div>
          <div class="form-group">
            <label>Tanggal Pelayanan</label>
            <input type="date" name="tgl" value="{{ $pelayanan->tgl_layanan }}" class="form-control @error('tgl') is-invalid @enderror">
               @error('tgl')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
          </div>
          <div class="form-group">
            <label>Jenis Vitamin</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$pelayanan->id_imun}} - {{$pelayanan->imunisasi}}</span>
            </div>
            <select name="vitamin" id="" class="form-control">
            @foreach ($imun as $imuns)
              <option value="{{$imuns->id_imun}}">{{$imuns->imunisasi}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
              <label>Jenis Imunisasi</label>
              <div class="input-group mb-3 ">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">{{$pelayanan->id_vaksin}} - {{$pelayanan->vaksin}}</span>
              </div>
              <select name="imunisasi" id="" class="form-control">
              @foreach ($vaksin as $vaksins)
                <option value="{{$vaksins->id_vaksin}}">{{$vaksins->vaksin}}</option>
              @endforeach
              </select>
              </div>
          <div class="form-group">
            <label>Penyuluhan</label>
            <textarea class="form-control" name="penyuluhan" id="" cols="30" rows="10">{{ $pelayanan->penyuluhan }}</textarea>
          </div>
          <input hidden type="text" name="id_timbang" value="{{$pelayanan->id_penimbangan}}">
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection