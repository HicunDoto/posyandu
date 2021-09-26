@extends('layout.admin')

@section('title','Data Balita')
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
          <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <input type="" hidden="" name="" value="">
                      <h4 class="modal-title w-100 text-center">Detail Data Balita</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                             <thead class="thead-dark">
                               <tr><th style="text-align: center;" scope="col" colspan="6">Data Balita</th></tr>
                               <tr>
                                 <th style="text-align: center;" scope="col">No</th>
                                 <th style="text-align: center;" scope="col">Nama</th>
                                 <th style="text-align: center;" scope="col">Tempat Tanggal Lahir</th>
                                 <th style="text-align: center;" scope="col">Orang tua</th>
                                 <th style="text-align: center;" scope="col">Email</th>
                                 <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                               @foreach ($balita as $balitas)
                               <tr>
                                 <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
                                 <td style="text-align: center;">{{$balitas->nama}}</td>
                                 <td style="text-align: center;">{{Str::upper($balitas->tempat)}}, {{$balitas->tl}}</td>
                                 <td style="text-align: center;">Anak dari Bapak {{Str::upper($balitas->ayah)}} & Ibu {{Str::upper($balitas->ibu)}}</td>
                                 <td style="text-align: center;">{{$balitas->email}}</td>
                                 <td style="text-align: center;">
                                   <a href="{{url('/admin/'.$balitas->id_user)}}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
                                 </td>
                               </tr>
                               @endforeach
                             </tbody>
                       </table>
                         </div>
                         <a href="{{url('/admin/input-akun')}}" class="btn badge badge-pill badge-primary"><span data-feather="plus"></span> Tambah Data</a>
                         <a href="{{url('/admin')}}" class="btn badge badge-pill badge-light"><span data-feather="chevrons-left"></span> Kembali</a>
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