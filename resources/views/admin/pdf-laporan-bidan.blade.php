<center><h3>LAPORAN KEGIATAN
  <br>POSYANDU KEMUNING I
  <br>DESA PRASUNG KEC. BUDURAN KAB. SIDOARJO</h3></center>
  <hr>
  <p><b>Laporan Bidan :</b></p>
<table border="0.5" class="table">
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
    </div>
    </tbody>
</table>