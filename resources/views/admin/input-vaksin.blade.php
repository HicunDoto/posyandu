@extends('layout.admin')

@section('title','Tambah Data Vaksin')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Vaksin</h4>
      <form method="post" action="{{url('/admin/input-vaksin/')}}">
      	@csrf
          <div class="form-group">
            <label>Nama Vaksin</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Usia</label>
              <input type="text" name="usia" value="{{ old('usia') }}" class="form-control @error('usia') is-invalid @enderror" placeholder="0 - 9 Bulan">
            @error('usia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Jadwal</label>
            <select class="form-control" name="jadwal" placeholder="Jadwal">
              <option value="1">Kegiatan Vaksinasi</option>
            </select>
          </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection