@extends('layout.admin')

@section('title','Data Kader')

@section('table-responsive')
      <h4>Data kader</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-kader')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
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
              <th style="text-align: center;" scope="col">Nama</th>
              <th style="text-align: center;" scope="col">Tempat Imunisasi</th>
              <th style="text-align: center;" scope="col">Jenis Kelamin</th>
              <th style="text-align: center;" scope="col">Nomer Telepon</th>
              <th style="text-align: center;" scope="col">Jabatan</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kader as $kaders)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$kaders->nama_kader}}</td>
              <td style="text-align: center;">{{$kaders->tempat}}</td>
              <td style="text-align: center;">
                @if ($kaders->jenis=="1")
                  Laki-laki
                @else
                  Perempuan
                @endif
              </td>
              <td style="text-align: center;">{{$kaders->no_telp}}</td>
              <td style="text-align: center;">
                @if ($kaders->jabatan=="ketua")
                  Ketua
                @else
                  Staff
                @endif
              </td>
              <td style="text-align: center;">
                <a href="/admin/detail-kader/{{ $kaders->id_kader }}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
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