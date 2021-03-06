@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Paket
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Paket</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
    <!-- <a href="{{ url('adminpaket/tambah') }}" class="btn btn-success btn-lg pull-right">Tambah paket</a> -->
    <!-- <form action="{{ url('/adminpaket/import') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import Bulk Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export Bulk Data</a>
    </form> -->
  </div>
  <div class="col-md-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar paket dalam penjualan Order Online</h3>
      <p>Anda harus menginput daftar paket pada menu materi yang anda jual di order online</p>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Paket</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($paket as $p)
              		<tr>
                    <td>{{ $p->nama_paket }}</td>
              			<!-- <td>
              				<a href="{{ url('adminpaket/edit/'.$p->id) }}">Edit</a>
              				|
              				<a href="{{ url('adminpaket/hapus_aksi/'.$p->id) }}">Hapus</a>
              			</td> -->
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
</div>
</section>
<!-- /.content -->
@endsection
<!-- DataTables -->
