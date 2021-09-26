@extends('layout.admin')

@section('title','Edit Data Imunisasi')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Imunisasi</h4>
      <form method="post" action="/admin/imunisasi/{{$imun->id_imun}}">
        @method('put')
      	@csrf
  <div class="form-group">
    <label>Nama Imunisasi</label>
    <input type="text" name="nama" value="{{$imun->imunisasi}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Imunisasi">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <div class="form-group">
    <label>Usia</label>
    <select class="form-control" name="usia" placeholder="Usia">
      @if ($imun->usia=="0 - 9 bulan")
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
      <option value="2">Kegiatan Imunisasi</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection