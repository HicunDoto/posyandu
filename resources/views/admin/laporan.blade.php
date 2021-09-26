@extends('layout.admin')

@section('title','Laporan')

@section('table-responsive')
      <h4>Laporan</h4>
      <form action="{{url('/admin/laporan')}}" method="GET" role="search">
      <table>
        <tr>
          <td>
            <div class="form-group">
                    <div class="input-group mb-3 ">
                      <input class="form-control" type="text" name="search">
                    <div class="input-group-prepend">
                    <button class="btn btn-primary">Cari</button>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3 ">
                      <select class="form-control" name="search1">
                        @foreach ($pelayanan1 as $pelayanans1)
                        <option value="{{$pelayanans1->tgl_layanan}}">{{Carbon::parse($pelayanans1->tgl_layanan)->formatLocalized('%A, %d %B %Y')}}</option>
                        @endforeach
                      </select>
                    <div class="input-group-prepend">
                    <button class="btn btn-primary">Cari</button>
                    </div>
                    </div>
                </div>
          </td>
        </tr>
      </table>
      </form>
      <a target="_blank" class="badge badge-pill badge-success" href="{{url('/admin/pdf-laporan')}}">Export Pdf</a>
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

      <div class="table-responsive">
     <table id="example" class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Tanggal Pelaksanaan</th>
              <th style="text-align: center;" scope="col">Nama</th>
              <th style="text-align: center;" scope="col">Berat Timbangan</th>
              <th style="text-align: center;" scope="col">Tinggi Pengukuran</th>
              <th style="text-align: center;" scope="col">Jenis Vitamin</th>
              <th style="text-align: center;" scope="col">Jenis Imunisasi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelayanan as $pelayanans)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{Carbon::parse($pelayanans->tgl_layanan)->formatLocalized('%A, %d %B %Y')}}</td>
              <td style="text-align: center;">{{$pelayanans->nama}}</td>
              <td style="text-align: center;">{{$pelayanans->bb}}</td>
              <td style="text-align: center;">{{$pelayanans->tb}}</td>
              <td style="text-align: center;">Vitamin {{$pelayanans->imunisasi}}</td>
              <td style="text-align: center;">{{$pelayanans->vaksin}}</td>
            </tr>
            @endforeach
          </tbody>
    </table>
      </div>

@endsection