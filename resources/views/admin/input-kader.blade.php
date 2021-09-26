@extends('layout.admin')

@section('title','Tambah Data Kader')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Kader</h4>
      <form method="post" action="/admin/input-kader/">
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
              <label>Jabatan</label>
              <select class="form-control" name="jabatan" placeholder="Jenis Kelamin">
                <option value="ketua">Ketua</option>
                <option value="staff">Staff</option>
              </select>
            </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jenis" placeholder="Jenis Kelamin">
              <option value="1">Perempuan</option>
              <option value="0">Laki-laki</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nomer Telepon</label>
            <input type="number" name="no_telp" value="{{ old('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror" placeholder="085733778832">
            @error('no_telp')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Alamat Rumah</label>
           <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Jln. Desa Prasung Tani">{{ old('alamat') }}</textarea>
               @error('alamat')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
          </div>
          <div class="form-group">
            <label>Alamat Tugas</label>
           <textarea class="form-control  @error('tempat') is-invalid @enderror" name="tempat" rows="3" placeholder="Jln.Desa Prasung Tani">{{ old('tempat') }}</textarea>
               @error('tempat')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
          </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection