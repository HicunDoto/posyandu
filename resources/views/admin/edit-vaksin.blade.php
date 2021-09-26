@extends('layout.admin')

@section('title','Edit Data Vaksin')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Vaksin</h4>
      <form method="post" action="/admin/vaksinasi/{{$vaksin->id_vaksin}}">
        @method('put')
      	@csrf
  <div class="form-group">
    <label>Nama Vaksin</label>
    <input type="text" name="nama" value="{{$vaksin->vaksin}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Vaksin">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Usia</label>
    <select class="form-control" name="usia" placeholder="Usia">
      @if ($vaksin->usia=="0 - 9 bulan")
      <option value="0 - 9 bulan" selected>0 - 9 bulan</option>
      <option value="10 - 18 bulan">10 - 18 bulan</option>
      @else
      <option value="0 - 9 bulan">0 - 9 bulan</option>
      <option value="10 - 18 bulan" selected>10 - 18 bulan</option>
      @endif
    </select>
  </div>
  <div class="form-group">
    <label>Jadwal</label>
    <select class="form-control" name="jadwal" placeholder="Jadwal">
      <option value="1">Kegiatan Vaksinasi</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection