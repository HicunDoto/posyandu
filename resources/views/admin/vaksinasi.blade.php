@extends('layout.admin')

@section('title','Data Vaksin')

@section('table-responsive')
<div>
      <h4>Jenis vaksin</h4>
      <table>
        <tr>
          <td>
            <a href="{{url('/admin/input-vaksin')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
          </td>
          {{-- <td>
            <a href="{{url('/admin/input-data-vaksin')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah Data Vaksinasi Balita</a>
          </td> --}}
        </tr>
      </table>
      <div class="table-responsive">
     <table class="table">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">No</th>
              <th style="text-align: center;" scope="col">Nama Vaksin</th>
              <th style="text-align: center;" scope="col">Usia</th>
              <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vaksin as $vaksins)
            <tr>
              <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
              <td style="text-align: center;">{{$vaksins->vaksin}}</td>
              <td style="text-align: center;">{{$vaksins->usia}}</td>
              <td style="text-align: center;">
                <button class="d-inline badge badge-pill badge-primary"><a href="/admin/vaksinasi/{{ $vaksins->id_vaksin }}/edit-vaksin" class="badge badge-pill badge-primary" ><span data-feather="edit"></span> Edit</a></button>
                <form action="/admin/vaksinasi/{{$vaksins->id_vaksin}}" method="post" class="d-inline delete">
                  @method('delete')
                  @csrf
                  <button style="height: 30px;" type="submit" class="badge badge-pill badge-danger"><span data-feather="trash"></span> Hapus</button>
                </form>
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
{{-- <div>
  <h4>Data vaksin</h4>
  <table>
    <tr>
      <td>
        <a href="{{url('/admin/input-data-vaksin')}}" class="badge badge-pill badge-primary" ><span data-feather="plus"></span> Tambah</a>
      </td>
    </tr>
  </table>
  <div class="table-responsive">
 <table class="table">
      <thead class="thead-dark">
        <tr>
          <th style="text-align: center;" scope="col">No</th>
          <th style="text-align: center;" scope="col">Nama Balita</th>
          <th style="text-align: center;" scope="col">Nama Vaksin</th>
          <th style="text-align: center;" scope="col" colspan="2" style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dtvaksin as $dtvaksins)
        <tr>
          <th style="text-align: center;" scope="row">{{ $loop->iteration}}</th>
          <td style="text-align: center;">{{$dtvaksins->nama}}</td>
          <td style="text-align: center;">{{$dtvaksins->vaksin}}</td>
          <td style="text-align: center;">
            <a href="/admin/detail-data-vaksin/{{ $dtvaksins->id_dtvaksin }}" class="badge badge-pill badge-primary" ><span data-feather="book"></span> Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
</table>
  </div>
  @if (session('vaksin'))
      <div class="alert alert-success">
          {{ session('vaksin') }}
      </div>
  @endif
  @if (session('admin'))
      <div class="alert alert-success">
          {{ session('admin') }}
      </div>
  @endif 
</div> --}}
@endsection