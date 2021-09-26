@extends('layout.admin')

@section('title','Edit Data Imunisasi')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Imunisasi</h4>
      <form method="post" action="/admin/detail-data-imun/{{$dtimun->id_dtimun}}">
        @method('put')
      	@csrf
          <div class="form-group">
            <label>Nama Balita</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$dtimun->id_balita}} - {{$dtimun->nama}}</span>
            </div>
            <select name="id_balita" id="" class="form-control">
            @foreach ($balita as $balitas)
              <option value="{{$balitas->id_balita}}">{{$balitas->nama}}</option>
            @endforeach
            </select>
            </div>
          </div>
          <div class="form-group">
            <label>Jenis Imunisasi</label>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">{{$dtimun->id_imun}} - {{$dtimun->imunisasi}}</span>
            </div>
            <select name="id_imun" id="" class="form-control">
            @foreach ($imun as $imuns)
              <option value="{{$imuns->id_imun}}">{{$imuns->imunisasi}}</option>
            @endforeach
            </select>
            </div>
          </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection