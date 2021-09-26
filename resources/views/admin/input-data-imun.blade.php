@extends('layout.admin')

@section('title','Tambah Data Imunisasi')

@section('table-responsive')
   <div class="col-6">   
      <h4>Tambah Data Imunisasi</h4>
      <form method="post" action="{{url('/admin/input-data-imun/')}}">
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
            <label>Nama Imunisasi</label>
            <select name="id_imun" id="" class="form-control">
              @foreach ($imun as $imuns)
              <option value="{{$imuns->id_imun}}">@if ($imuns->imunisasi=="A")
                Vitamin A
              @elseif($imuns->imunisasi=="B")
                Vitamin B
              @else
                Vitamin C
              @endif</option>
              @endforeach
            </select>
          </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection