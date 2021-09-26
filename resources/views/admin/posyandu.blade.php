@extends('layout.admin')

@section('title','Nama Posyandu')

@section('table-responsive')
<div>
      <h4>Posyandu</h4>
      <div class="table-responsive">
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Nama Posyandu</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posyandu as $posyandus)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$posyandus->posyandu}}</td>
              <td style="text-align: center;">
                <a href="/admin/posyandu/{{ $posyandus->id_posyandu }}/edit-posyandu" class="badge badge-pill badge-primary" ><span data-feather="edit"></span> Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
    </table>
      </div>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      @if (session('admin'))
          <div class="alert alert-success">
              {{ session('admin') }}
          </div>
      @endif
</div>

@endsection