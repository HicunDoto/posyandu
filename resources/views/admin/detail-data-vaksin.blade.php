@extends('layout.admin')

@section('title','Detail Data Vaksin')
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
                      <h4 class="modal-title w-100 text-center">Detail Data Vaksinasi</h4>
                  </div>
                  <div class="modal-body">
                    <p><h6><td>Nama Balita </td><td> :</td><td> {{$dtvaksin->nama}}</td></h6></p>
                    <p><h6><td>Jenis Vaksin </td><td> :</td><td> {{$dtvaksin->vaksin}}</td></h6></p>
                <a href="{{$dtvaksin->id_dtvaksin}}/edit-data-vaksin" class="btn btn-outline-info"><span data-feather="edit"></span> Edit</a>
                <form action="/admin/detail-data-vaksin/{{$dtvaksin->id_dtvaksin}}" method="post" class="d-inline delete">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger"><span data-feather="trash"></span> Hapus</button>
                </form>
                <a href="{{url('/admin/vaksinasi')}}" class="btn badge badge-pill badge-light"><span data-feather="chevrons-left"></span> Kembali</a>
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