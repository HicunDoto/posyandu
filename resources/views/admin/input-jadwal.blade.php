@extends('layout.admin')

@section('title','Tambah Jadwal')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Jadwal</h4>
      <form method="post" action="{{url('/admin/input-jadwal/')}}">
      	@csrf
          <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="kegiatan" value="{{ old('kegiatan') }}" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Nama Kegiatan">
            @error('kegiatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Tanggal Kegiatan">
            @error('tgl')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection