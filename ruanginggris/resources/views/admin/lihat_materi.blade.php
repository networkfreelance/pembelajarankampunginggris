@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Materi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Lihat Materi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
  <!-- Default box -->
  <div class="col-md-12">
  <a href="{{ url('adminpaket/tambah/') }}" class="btn btn-success btn-lg pull-right">Tambah Paket</a>
  </div>
  <div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">

      <h3 class="box-title">Daftar paket</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nama Paket</th>
                <th>Buku</th>
                <th>Materi</th>
              </tr>
              </thead>
              <tbody>
                @foreach($paket as $p)
                <tr>
                  <td>{{ $p->nama_paket }}</td>
                  <td>{{ $p->buku }}</td>
                  <td>
                    <a href="{{ url('adminmateri/lihat_materi/'.$p->id_paket) }}">Tonton Materi</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
  </div>
  <div class="col-md-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <a href="{{ url('admin_materi_tambah/'.$id_paket) }}" class="btn btn-success btn-lg pull-right">Tambah Materi</a>
      <h3 class="box-title">Daftar materi dari {{ $nama_paket }}</h3>
    </div>
    <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Materi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($materi as $p2)
                  <tr>
                    <td>{{ $p2->nama_materi }}</td>
                    <td>
                      <a href="{{ url('/admin_materi_edit/'.$p2->id_materi.'/'.$id_paket) }}">Edit</a> |
                      <a href="{{ url('/hapus_aksi/'.$p2->id_materi.'/'.$p2->video) }}">Hapus<input type="hidden" value="{{ $p2->video }}"></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
  </div>
  <!-- /.box -->
  </div>


</div>
</section>




<!-- /.content -->
@endsection
<!-- DataTables -->
