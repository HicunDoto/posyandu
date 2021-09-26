@extends('layout.admin')

@section('title','Edit Data Kader')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Kader</h4>
      <form method="post" action="/admin/detail-kader/{{$kader->id_kader}}">
        @method('put')
      	@csrf
  <div class="form-group">
    <label>Nama Kader</label>
    <input type="text" name="nama" value="{{$kader->nama_kader}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Bidan">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Tempat, Tanggal Lahir</label>
    <div class="input-group mb-3">
    <input type="text" name="tl" value="{{$kader->tempatl}}" class="form-control @error('tl') is-invalid @enderror" placeholder="Sidoarjo">
       @error('tl')
           <div class="alert alert-danger">{{ $message }}</div>
       @enderror
     <div class="input-group-append">
     <input type="date" name="tgl" value="{{$kader->tl}}" class="form-control @error('tgl') is-invalid @enderror">
     </div>
    </div>
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jenis" placeholder="Jenis Kelamin">
      @if ($kader->jenis=="1")
      <option selected value="1">Laki - laki</option>
      <option value="0">Perempuan</option>
      @else
      <option value="1">Laki - laki</option>
      <option value="0" selected>Perempuan</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label>Jabatan</label>
    <select class="form-control" name="jabatan" placeholder="Jenis Kelamin">
      @if ($kader->jabatan=="ketua")
      <option selected value="ketua">Ketua</option>
      <option value="staff">Staff</option>
      @else
      <option value="ketua">Ketua</option>
      <option value="staff" selected>Staff</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label>Nomer Telepon</label>
    <input type="number" name="no_telp" value="{{ $kader->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror" placeholder="085733778832">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Alamat Rumah</label>
   <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Jln. Desa Prasung Tani">{{ $kader->alamat }}</textarea>
       @error('alamat')
           <div class="alert alert-danger">{{ $message }}</div>
       @enderror
  </div>
  <div class="form-group">
    <label>Alamat Tugas</label>
   <textarea class="form-control  @error('tempat') is-invalid @enderror" name="tempat" rows="3" placeholder="Jln. Desa Prasung Tani">{{ $kader->tempat }}</textarea>
       @error('tempat')
           <div class="alert alert-danger">{{ $message }}</div>
       @enderror
  </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection