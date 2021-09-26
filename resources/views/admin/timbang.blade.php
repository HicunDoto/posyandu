@extends('layout.admin')

@section('title','Data Penimbang')

@section('table-responsive')
      <h4>Data penimbang</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-timbang')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
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
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Nama Balita</th>
              <th style="text-align: center;" scope="col">Berat Timbangan</th>
              <th style="text-align: center;" scope="col">Tinggi Pengukuran</th>
              <th style="text-align: center;" scope="col">Tanggal Penimbangan</th>
              <th style="text-align: center;" scope="col">Bidan</th>
              <th style="text-align: center;" scope="col">Kader</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($timbang as $timbangs)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$timbangs->nama}}</td>
              <td style="text-align: center;">{{$timbangs->bb}}</td>
              <td style="text-align: center;">{{$timbangs->tb}}</td>
              <td style="text-align: center;">{{Carbon::parse($timbangs->tgl_timbang)->format('d-M-Y')}}</td>
              <td style="text-align: center;">{{$timbangs->nama_bidan}}</td>
              <td style="text-align: center;">{{$timbangs->nama_kader}}</td>
              <td style="text-align: center;">
                <a href="{{url('/admin/detail-timbang/'.$timbangs->id_penimbangan)}}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
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