@extends('layout.admin')

@section('title','Tambah Akun')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah akun</h4>
      <form method="post" action="{{url('/admin/input-akun/')}}">
      	@csrf
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@email.com">
    @error('email')
    	<div class="alert alert-danger">{{ $message }}</div>
	  @enderror
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="password">
    @error('password')
    	<div class="alert alert-danger">{{ $message }}</div>
	  @enderror
  </div>
  <div class="form-group">
    <label>Ulangi Password</label>
    <input type="text" name="u_password" value="{{ old('u_password') }}" class="form-control @error('u_password') is-invalid @enderror" placeholder="ulangi password">
    @error('u_password')
    	<div class="alert alert-danger">{{ $message }}</div>
	  @enderror
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection