@extends('layout.admin')

@section('title','Tambah Balita')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Diri Balita</h4>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <form method="post" action="/admin/input-balita/{{$user->id_user}}">

        @csrf
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Tempat, Tanggal Lahir</label>
    <div class="input-group mb-3">
    <input type="text" name="tl" value="{{ old('tl') }}" class="form-control @error('tl') is-invalid @enderror" placeholder="Sidoarjo">
   	@error('tl')
   		<div class="alert alert-danger">{{ $message }}</div>
   	@enderror
     <div class="input-group-append">
     <input type="date" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Sidoarjo">
     </div>
    </div>
    </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jenis" placeholder="Jenis Kelamin">
      <option value="1">Laki-laki</option>
      <option value="0">Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label>Ayah</label>
    <input type="text" name="ayah" value="{{ old('ayah') }}" class="form-control @error('ayah') is-invalid @enderror" placeholder="Nama Ayah">
    @error('ayah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Ibu</label>
    <input type="text" name="ibu" value="{{ old('ibu') }}" class="form-control @error('ibu') is-invalid @enderror" placeholder="Nama Ibu">
    @error('ibu')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Anak ke</label>
    <input type="text" name="anakke" value="{{ old('anakke') }}" class="form-control @error('anakke') is-invalid @enderror" placeholder="1/2/3">
    @error('anakke')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Alamat</label>
   <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Jln. Desa Prasung Tani">{{ old('alamat') }}</textarea>
   	@error('alamat')
   		<div class="alert alert-danger">{{ $message }}</div>
   	@enderror
  </div>
  <div class="form-group" hidden>
  <input type="text" name="id_user" hidden value="{{$user->id_user}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection