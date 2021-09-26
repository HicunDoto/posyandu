@extends('layout.admin')

@section('title','Edit Data Jadwal')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Jadwal</h4>
      <form method="post" action="/admin/detail-jadwal/{{$jadwal->id_jadwal}}">
        @method('put')
      	@csrf
          <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="kegiatan" value="{{$jadwal->nama_kegiatan}}" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Nama Kegiatan">
            @error('kegiatan')
    	<div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tgl" value="{{ $jadwal->tgl_kegiatan }}" class="form-control @error('tgl') is-invalid @enderror">
               @error('tgl')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
          </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection