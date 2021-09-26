@extends('layout.user')

@section('title','Laporan')

@section('table-responsive')
@php
$id_timbang = '';
$no = '';
$nama = '';
$email = '';
$jumlah = '';
$pesan = '';
@endphp
  {{-- modal --}}
  <div class="modal fade" id="show" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center" >DATA PERBULAN</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-dark" width = "50%">
                         <thead class="thead-dark">
                           <tr>
                             <th style="text-align: center;" scope="col" colspan="100">DATA</th>
                           </tr>
                         </thead>
                         <tbody>
                           @foreach ($penimbangan as $penimbangans)
                           <tr>
                            @php
                            $no .= '<th class="bg-info" style="text-align: center;" scope="row">'.Carbon::parse($penimbangans->tl)->diffInMonths(Carbon::parse($penimbangans->tgl_timbang)).'</th>' ;
                            $nama .= '<td class="bg-info" style="text-align: center;">'.Carbon::parse($penimbangans->tgl_timbang)->formatLocalized('%B %Y').'</td>';
                            $email .= '<td class="bg-info" style="text-align: center;">'.$penimbangans->bb.' kg</td>';
                            $jumlah .= '<td class="bg-info" style="text-align: center;"><b>'.$penimbangans->tb.' cm</b></td>';
                            if ($penimbangans->bb>=4.5 && $penimbangans->bb<7) {
                                if ($penimbangans->tb>=54.7 && $penimbangans->tb<75.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Normal & Tinggi Badan Normal</b></td>';
                                }elseif($penimbangans->tb<54.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Normal & Tinggi Badan Pendek</b></td>';
                                }else{
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Normal & Tinggi Badan Upnormal</b></td>';
                                }
                            }elseif ($penimbangans->bb>=7 && $penimbangans->bb<=10) {
                                if ($penimbangans->tb>=54.7 && $penimbangans->tb<75.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Gemuk & Tinggi Badan Normal</b></td>';
                                }elseif($penimbangans->tb<54.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Gemuk & Tinggi Badan Pendek</b></td>';
                                }else{
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Gemuk & Tinggi Badan Upnormal</b></td>';
                                }
                            }elseif($penimbangans->bb<4.5) {
                                if ($penimbangans->tb>=54.7 && $penimbangans->tb<75.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Kurus & Tinggi Badan Normal</b></td>';
                                }elseif($penimbangans->tb<54.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Kurus & Tinggi Badan Pendek</b></td>';
                                }else{
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Kurus & Tinggi Badan Upnormal</b></td>';
                                }
                            }else {
                                if ($penimbangans->tb>=54.7 && $penimbangans->tb<75.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Upnormal & Tinggi Badan Normal</b></td>';
                                }elseif($penimbangans->tb<54.7) {
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Upnormal & Tinggi Badan Pendek</b></td>';
                                }else{
                                    $pesan .= '<td class="bg-info" style="text-align: center;"><b>Berat Badan Upnormal & Tinggi Badan Upnormal</b></td>';
                                }
                            }
                           @endphp
                          </tr>
                           @endforeach
                           <tr><th style="text-align: center; width: 10%;" scope="col">Umur(bln)</th>@php echo $no; @endphp</tr>
                           <tr><th style="text-align: center; width: 10%;" scope="col">Bulan Penimbangan</th>@php echo $nama; @endphp</tr>
                           <tr><th style="text-align: center; width: 10%;" scope="col">BB(Kg)</th>@php echo $email; @endphp</tr>
                           <tr><th style="text-align: center; width: 10%;" scope="col">TB(Cm)</th>@php echo $jumlah; @endphp</tr>
                           <tr><th style="text-align: center; width: 10%;" scope="col">Pesan</th>@php echo $pesan; @endphp</tr>
                           {{-- @php print_r($bulan); @endphp --}}
                          </tbody>
                   </table>
                     </div>
          <a href="{{url('/dashboard/laporan')}}" class="btn badge badge-pill badge-light"><span data-feather="chevrons-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</div>
  {{-- batas modal --}}
  @endsection