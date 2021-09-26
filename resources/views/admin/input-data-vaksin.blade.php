@extends('layout.admin')

@section('title','Tambah Data Vaksin')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Vaksinasi</h4>
      <form method="post" action="{{url('/admin/input-data-vaksin/')}}">
      	@csrf
          <div class="form-group">
            <label>Nama Balita</label>
            <select name="id_balita" id="" class="form-control">
              @foreach ($balita as $balitas)
              <option value="{{$balitas->id_balita}}">{{$balitas->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nama Vaksin</label>
            <select name="id_vaksin" id="" class="form-control">
              @foreach ($vaksin as $vaksins)
              <option value="{{$vaksins->id_vaksin}}">@if ($vaksins->vaksin=="Vaksin Hepatitis B")
                Vaksin Hepatitis B
              @elseif($vaksins->vaksin=="Vaksin BCG")
                Vaksin BCG
                @elseif($vaksins->vaksin=="Vaksin polio")
                Vaksin polio
                @elseif($vaksins->vaksin=="Vaksin campak")
                Vaksin campak
              @else
                Vaksin DPT-HB-HIB
              @endif</option>
              @endforeach
            </select>
          </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection