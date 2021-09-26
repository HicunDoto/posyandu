@extends('layout.admin')

@section('title','Data Vitamin')

@section('table-responsive')
      <h4>Jenis Vitamin</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-imun')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
          </td>
          {{-- <td>
            <a href="{{url('/admin/input-data-imun')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah Data Imunisasi Balita</a>
          </td> --}}
        </tr>
      </table>
      <div class="table-responsive">
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Nama Imunisasi</th>
              <th style="text-align: center;" scope="col">Usia</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($imun as $imuns)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$imuns->imunisasi}}</td>
              <td style="text-align: center;">{{$imuns->usia}}</td>
              <td style="text-align: center;">
                <button class="d-inline badge badge-pill badge-primary"><a href="/admin/imunisasi/{{ $imuns->id_imun }}/edit-imun" class="badge badge-pill badge-primary" ><span data-feather="edit"></span> Edit</a></button>
                <form action="/admin/imunisasi/{{$imuns->id_imun}}" method="post" class="d-inline delete">
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
  {{-- <div>
    <h4>Data Imunisasi</h4>
    <table>
      <tr>
        <td>
          <a href="{{url('/admin/input-data-imun')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
        </td>
      </tr>
    </table>
    <div class="table-responsive">
  <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;" scope="col">No</th>
            <th style="text-align: center;" scope="col">Nama Balita</th>
            <th style="text-align: center;" scope="col">Nama Imunisasi</th>
            <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dtimun as $dtimuns)
          <tr>
            <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
            <td style="text-align: center;">{{$dtimuns->nama}}</td>
            <td style="text-align: center;">{{$dtimuns->imunisasi}}</td>
            <td style="text-align: center;">
              <a href="/admin/detail-data-imun/{{ $dtimuns->id_dtimun }}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
  </table>
    </div>
    @if (session('imun'))
        <div class="alert alert-success">
            {{ session('imun') }}
        </div>
    @endif
    @if (session('admin'))
        <div class="alert alert-success">
            {{ session('admin') }}
        </div>
    @endif 
  </div> --}}
@endsection