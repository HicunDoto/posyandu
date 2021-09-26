@extends('layout.admin')

@section('title','Detail Balita')
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
                      <h4 class="modal-title w-100 text-center">Detail Data Perseorangan Balita</h4>
                  </div>
                  <div class="modal-body">
                    <table>
                    <tr><td><h6>Nama Balita </h6></td><td><h6> :</h6></td><td><h6>{{$balita->nama}}</h6></td></tr>
                    <tr><td><h6>Tempat Tanggal Lahir </h6></td><td><h6> :</h6></td><td><h6>{{$balita->tempat}}, {{Carbon::parse($balita->tl)->format('d-M-Y')}}</h6></td></tr>
                    <tr><td><h6>Jenis Kelamin </h6></td><td><h6> :</h6></td><td><h6> 
                      @if ($balita->jenis=="1")
                        Laki-laki
                      @else
                        Perempuan
                      @endif</h6></td></tr>
                    <tr><td><h6>Orang tua </h6></td><td><h6> :</h6></td><td><h6> Anak dari Bapak {{Str::upper($balita->ayah)}} & Ibu {{Str::upper($balita->ibu)}}</h6></td></tr>
                    <tr><td><h6>Anak Ke </h6></td><td><h6> :</h6></td><td><h6> {{$balita->anakke}}</h6></td></tr>
                    <tr><td><h6>Alamat Rumah </h6></td><td><h6> :</h6></td><td><h6> {{$balita->alamat}}</h6></td></tr>
                    </table>
                <a href="{{$balita->id_user}}/edit-balita" class="btn btn-outline-info"><span data-feather="edit"></span> Edit</a>
                <form action="/admin/{{$balita->id_user}}" method="post" class="d-inline delete">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger"><span data-feather="trash"></span> Hapus</button>
                </form>
                <a href="{{url('/admin/lihat-balita')}}" class="btn badge badge-pill badge-light"><span data-feather="chevrons-left"></span> Kembali</a>
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