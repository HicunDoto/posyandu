@extends('layout.admin')

@section('title','Laporan')

@section('table-responsive')
      <h4>Laporan</h4>
      <form action="{{url('/admin/laporan')}}" method="GET" role="search">
      <table>
        <tr>
          <td>
                {{-- <div class="form-group">
                    <div class="input-group mb-3 ">
                      <input class="form-control" type="text" name="search">
                    <div class="input-group-prepend">
                    <button class="btn btn-primary">Cari</button>
                    </div>
                    </div>
                </div> --}}
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
      <a target="_blank" class="badge badge-pill badge-success" href="{{url('/admin/pdf-laporan-bidan')}}">Export Pdf</a>
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
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Tanggal Pelaksanaan</th>
              <th style="text-align: center;" scope="col">Jumlah Kader Aktif</th>
              <th style="text-align: center;" scope="col">Jumlah Balita Hadir</th>
              <th style="text-align: center;" scope="col">Jumlah Balita Tidak Hadir</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelayanan as $pelayanans)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{Carbon::parse($pelayanans->tgl_layanan)->formatLocalized('%A, %d %B %Y')}}</td>
              <td style="text-align: center;">{{$kader->count()}}</td>
              <td style="text-align: center;">{{$balita->count()}} Perempuan & {{$balitae->count()}} Laki Laki</td>
              <td style="text-align: center;">{{0}}</td>
            </tr>
            @endforeach
            <div class="d-flex justify-content-center">
              {{$pelayanan->links()}}
          </div>
          </tbody>
    </table>
      </div>

@endsection