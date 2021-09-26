@extends('layout.user')

@section('title','Dashboard')

@section('table-responsive')
{{-- @if ($dtimun1===null)
<div>
    <div class="table-responsive">
   <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;" scope="col">No</th>
            <th style="text-align: center;" scope="col">Nama Balita</th>
            <th style="text-align: center;" scope="col">Jenis Imunisasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3" style="text-align: center;"><h3>BELUM IMUNISASI</h3></td>
          </tr>
        </tbody>
  </table>
    </div>
</div>
@else --}}
<div>
    <div class="table-responsive">
   <table class="table">
        <thead class="thead-dark">
          <tr>
            <th style="text-align: center;" scope="col">No</th>
            <th style="text-align: center;" scope="col">Jenis Vitamin</th>
            <th style="text-align: center;" scope="col">Usia</th>
            <th style="text-align: center;" scope="col">Tanggal Pelaksanaan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dtimun as $dtimuns)
          <tr>
            <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
            <td style="text-align: center;">{{$dtimuns->imunisasi}}</td>
            <td style="text-align: center;">{{$dtimuns->usia}}</td>
            @foreach ($jadwal as $jadwals)
            <td style="text-align: center;">{{Carbon::parse($jadwals->tgl_kegiatan)->formatLocalized('%A, %d %B %Y')}}</td>
            @endforeach
          </tr>
          @endforeach
        </tbody>
  </table>
    </div>
</div>
{{-- @endif --}}
@endsection