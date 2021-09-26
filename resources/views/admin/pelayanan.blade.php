@extends('layout.admin')

@section('title','Pelayanan')

@section('table-responsive')
      <h4>Data Pelayanan</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-pelayanan')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
          </td>
        </tr>
      </table>
      <!-- Modal -->
{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
{{-- modal --}}
      <div class="table-responsive">
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">Kode Pelayanan</th>
              <th style="text-align: center;" scope="col">Nama</th>
              <th style="text-align: center;" scope="col">Tanggal Pelayanan</th>
              <th style="text-align: center;" scope="col">Jenis Vitamin</th>
              <th style="text-align: center;" scope="col">Jenis Imunisasi</th>
              <th style="text-align: center;" scope="col">Penyuluhan</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelayanan as $pelayanans)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$pelayanans->nama}}</td>
              <td style="text-align: center;">{{Carbon::parse($pelayanans->tgl_layanan)->format('d-M-Y')}}</td>
              <td style="text-align: center;">Vitamin {{$pelayanans->imunisasi}}</td>
              <td style="text-align: center;">{{$pelayanans->vaksin}}</td>
              <td style="text-align: center;">{{$pelayanans->penyuluhan}}</td>
              <td style="text-align: center;">
                <a href="{{url('/admin/detail-pelayanan/'.$pelayanans->id_pelayanan)}}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
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
@endsection