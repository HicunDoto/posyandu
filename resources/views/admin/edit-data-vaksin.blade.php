@extends('layout.admin')

@section('title','Edit Data Vaksin')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Vaksin</h4>
      <form method="post" action="/admin/detail-data-vaksin/{{$dtvaksin->id_dtvaksin}}">
        @method('put')
      	@csrf
          <div class="form-group">
            <label>Nama Balita</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$dtvaksin->id_balita}} - {{$dtvaksin->nama}}</span>
            </div>
            <select name="id_balita" id="" class="form-control">
            @foreach ($balita as $balitas)
              <option value="{{$balitas->id_balita}}">{{$balitas->nama}}</option>
            @endforeach
            </select>
            </div>
          </div>
          <div class="form-group">
            <label>Jenis Vaksin</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$dtvaksin->id_vaksin}} - {{$dtvaksin->vaksin}}</span>
            </div>
            <select name="id_vaksin" id="" class="form-control">
            @foreach ($vaksin as $vaksins)
              <option value="{{$vaksins->id_vaksin}}">{{$vaksins->vaksin}}</option>
            @endforeach
            </select>
            </div>
          </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection