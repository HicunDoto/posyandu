@extends('layout.admin')

@section('title','Detail Pelayanan')
@section('table-responsive')
  <!-- Modal -->
{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
<div class="modal fade" id="show" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <input type="" hidden="" name="" value="">
                      <h4 class="modal-title w-100 text-center">Detail Data Pelayanan</h4>
                  </div>
                  <div class="modal-body">
                    <table>
                    <tr><td><h6>Nama Balita </h6></td><td><h6>:</h6></td><td><h6> {{$pelayanan->nama}}</h6></td></tr>
                    <tr><td><h6>Nama Bidan </h6></td><td><h6>:</h6></td><td><h6> {{$pelayanan->nama_bidan}}</h6></td></tr>
                    <tr><td><h6>Nama Kader </h6></td><td><h6>:</h6></td><td><h6> {{$pelayanan->nama_kader}}</h6></td></tr>
                    <tr><td><h6>Tanggal Pelayanan </h6></td><td><h6>:</h6></td><td><h6>{{Carbon::parse($pelayanan->tgl_layanan)->format('d-M-Y')}}</h6></td></tr>
                    <tr><td><h6>Jenis Vitamin </h6></td><td><h6>:</h6></td><td><h6> {{$pelayanan->imunisasi}}</h6></td></tr>
                    <tr><td><h6>Jenis Imunisasi </h6></td><td><h6>:</h6></td><td><h6>Vitamin {{$pelayanan->vaksin}}</h6></td></tr>
                    <tr><td><h6>Penyuluhan </h6></td><td><h6>:</h6></td><td><h6> {{$pelayanan->penyuluhan}}</h6></td></tr>
                    </table>
                <a href="{{$pelayanan->id_pelayanan}}/edit-pelayanan" class="btn btn-outline-info"><span data-feather="edit"></span> Edit</a>
                <form action="/admin/detail-pelayanan/{{$pelayanan->id_pelayanan}}" method="post" class="d-inline delete">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger"><span data-feather="trash"></span> Hapus</button>
                </form>
                <a href="{{url('/admin/pelayanan')}}" class="btn badge badge-pill badge-light"><span data-feather="chevrons-left"></span> Kembali</a>
                  </div>
              </div>
          </div>
</div>
     

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
{{-- modal --}}
    

@endsection