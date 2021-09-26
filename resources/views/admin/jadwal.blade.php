@extends('layout.admin')

@section('title','Data Jadwal Kegiatan')

@section('table-responsive')
<div>
      <h4>Jadwal Kegiatan</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-jadwal')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
          </td>
        </tr>
      </table>
      <div class="table-responsive">
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Nama Kegiatan</th>
              <th style="text-align: center;" scope="col">Jadwal Kegiatan</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal as $jadwals)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$jadwals->nama_kegiatan}}</td>
              <td style="text-align: center;">{{Carbon::parse($jadwals->tgl_kegiatan)->formatLocalized('%A, %d %B %Y')}}</td>
              <td style="text-align: center;">
                <button class="d-inline badge badge-pill badge-primary"><a href="/admin/jadwal/{{$jadwals->id_jadwal}}/edit-jadwal" class="badge badge-pill badge-primary" ><span data-feather="edit"></span> Edit</a></button>
                <form action="/admin/jadwal/{{$jadwals->id_jadwal}}" method="post" class="d-inline delete">
                  @method('delete')
                  @csrf
                  <button style="height: 30px;" type="submit" class="badge badge-pill badge-danger"><span data-feather="trash"></span> Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
    </table>
      </div>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      @if (session('admin'))
          <div class="alert alert-success">
              {{ session('admin') }}
          </div>
      @endif
</div>
@endsection