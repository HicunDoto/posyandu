<center><h3>LAPORAN KEGIATAN
<br>POSYANDU KEMUNING I
<br>DESA PRASUNG KEC. BUDURAN KAB. SIDOARJO</h3></center>
<hr>
<p><b>Laporan Posyandu :</b></p>
<table border="0.5" id="example" class="table">
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