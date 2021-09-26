@extends('layout.admin')

@section('title','Edit Data Bidan')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Bidan</h4>
      <form method="post" action="/admin/detail-bidan/{{$bidan->id_bidan}}">
        @method('put')
      	@csrf
  <div class="form-group">
    <label>Nama Bidan</label>
    <input type="text" name="nama" value="{{$bidan->nama_bidan}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Bidan">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Tempat, Tanggal Lahir</label>
    <div class="input-group mb-3">
    <input type="text" name="tl" value="{{$bidan->tempat}}" class="form-control @error('tl') is-invalid @enderror" placeholder="Surabaya">
       @error('tl')
           <div class="alert alert-danger">{{ $message }}</div>
       @enderror
     <div class="input-group-append">
     <input type="date" name="tgl" value="{{$bidan->tl}}" class="form-control @error('tgl') is-invalid @enderror">
     </div>
    </div>
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jenis" placeholder="Jenis Kelamin">
      @if ($bidan->jenis=="1")
      <option selected value="1">Laki - laki</option>
      <option value="0">Perempuan</option>
      @else
      <option value="1">Laki - laki</option>
      <option value="0" selected>Perempuan</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status" placeholder="Jenis Kelamin">
      @if ($bidan->status=="aktif")
      <option selected value="aktif">Aktif</option>
      <option value="tidak">Tidak Aktif</option>
      @else
      <option value="aktif">Aktif</option>
      <option value="tidak" selected>Tidak</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label>Nomer Telepon</label>
    <input type="number" name="no_telp" value="{{ $bidan->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" placeholder="0838383838338">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Alamat</label>
   <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Jln.Desa Kemuning">{{ $bidan->alamat }}</textarea>
       @error('alamat')
           <div class="alert alert-danger">{{ $message }}</div>
       @enderror
  </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection