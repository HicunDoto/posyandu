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
<center><h2>LAPORAN - {{$load->nama}}</h2> <button class="btn btn-primary" onclick="window.print();">Cetak Laporan | <i data-feather="printer"></i></button>
  {{-- @if ($user->isEmpty())
  <h4 style="text-align: center">BELUM IMUNISASI</h4>
  @else --}}
  <div style="width: 80%">
    <div class="container">
      <div class="row">
          <div class="col-sm-6 col-sm-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                      <canvas id="canvas" height="380" width="500"></canvas>
                      
                  </div>
              </div>
          </div>
        <div class="col-sm-6 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <canvas id="canvas1" height="380" width="500"></canvas>
                </div>
            </div>
        </div>
      </div>
  </div>
  </div></center>
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
            $id_timbang .= '<td class="bg-info" style="text-align: center;"><a href="/dashboard/'.$penimbangans->id_penimbangan.'" type="button" class="btn btn-success btn-md">Lihat Bulan</a></td>';
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
           <tr><th style="text-align: center; width: 10%;" scope="col">Data Perbulan</th>@php echo $id_timbang; @endphp</tr>
           <tr><th style="text-align: center; width: 10%;" scope="col">Umur(bln)</th>@php echo $no; @endphp</tr>
           {{-- @php print_r($bulan); @endphp --}}
          </tbody>
   </table>
     </div>
     <div class="d-flex justify-content-center">
      {{-- {{$user->links('pagination::bootstrap-4')}} --}}
    </div>
  {{-- @endif --}}
  @endsection
  @push('script')
  <script>
    var bulan = <?php 
    echo $bulan2;
    ?> ;
    var data1 = <?php echo $data1; ?> ;
    var data = <?php echo $data; ?> ;
    var label = ['<?php echo $labels[0]; ?>'] ;

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: {
        datasets: [{
            label: label,
            backgroundColor: "transparent",
            pointStyle: 'circle',
            borderColor: 'rgba(0, 129, 231, 0.2)',
            pointRadius: '10',
            pointBackgroundColor: "rgba(0, 129, 231, 1)",
            data: data
        }],
        labels: bulan
    },
            options: {
                legend: {
                labels: {
                  usePointStyle: true,
                },
                },
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
                responsive: true,
                title: {
                    display: true,
                    text: 'KMS - BERAT BADAN'
                }
            }
        });

        var ctx = document.getElementById("canvas1").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: {
        datasets: [{
            label: label,
            backgroundColor: "transparent",
            pointStyle: 'circle',
            borderColor: 'rgba(0, 129, 231, 0.2)',
            pointRadius: '10',
            pointBackgroundColor: "rgba(0, 129, 231, 1)",
            data: data1
        }],
        labels: bulan
    },
            options: {
                legend: {
                labels: {
                  usePointStyle: true,
                },
                },
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
                responsive: true,
                title: {
                    display: true,
                    text: 'KMS - TINGGI BADAN'
                }
            }
        });


    };

</script>
  @endpush
  