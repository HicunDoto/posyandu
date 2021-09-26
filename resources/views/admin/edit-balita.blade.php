@extends('layout.admin')

@section('title','Tambah Balita')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Diri Balita</h4>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <form method="post" action="/admin/{{$balita->id_user}}">
        @method('put')
        @csrf
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@email.com">
    @error('email')
    	<div class="alert alert-danger">{{ $message }}</div>
	  @enderror
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{$balita->nama}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Tempat, Tanggal Lahir</label>
    <div class="input-group mb-3">
    <input type="text" name="tl" value="{{ $balita->tempat }}" class="form-control @error('tl') is-invalid @enderror" placeholder="Sidoarjo">
   	@error('tl')
   		<div class="alert alert-danger">{{ $message }}</div>
   	@enderror
     <div class="input-group-append">
     <input type="date" name="tgl" value="{{ $balita->tl }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Sidoarjo">
     </div>
    </div>
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
      <select class="form-control" name="jenis" placeholder="Jenis Kelamin">
        @if ($balita->jenis=="1")
        <option selected value="1">Laki - laki</option>
        <option value="0">Perempuan</option>
        @else
        <option value="1">Laki - laki</option>
        <option value="0" selected>Perempuan</option>
        @endif
      </select>
    </div>
  <div class="form-group">
    <label>Ayah</label>
    <input type="text" name="ayah" value="{{ $balita->ayah }}" class="form-control @error('ayah') is-invalid @enderror" placeholder="Nama Ayah">
    @error('ayah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Ibu</label>
    <input type="text" name="ibu" value="{{ $balita->ibu }}" class="form-control @error('ibu') is-invalid @enderror" placeholder="Nama Ibu">
    @error('ibu')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Anak ke</label>
    <input type="text" name="anakke" value="{{ $balita->anakke }}" class="form-control @error('anakke') is-invalid @enderror" placeholder="1/2/3">
    @error('anakke')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Alamat</label>
   <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Jln. Desa Prasung Tani">{{ $balita->alamat }}</textarea>
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