@extends('layout.admin')

@section('title','Edit Data Posyandu')

@section('table-responsive')
   <div class="col-6">   
      <h4>Edit Data Nama Posyandu</h4>
      <form method="post" action="/admin/edit-posyandu/{{$posyandu->id_posyandu}}">
        @method('put')
      	@csrf
  <div class="form-group">
    <label>Nama Posyandu</label>
    <input type="text" name="nama" value="{{$posyandu->posyandu}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Vaksin">
    @error('nama')
    	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
  <button type="submit" class="btn btn-primary">Simpan Edit</button>
</form>
</div>
@endsection