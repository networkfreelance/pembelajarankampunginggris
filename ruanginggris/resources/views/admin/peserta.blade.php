@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Peserta
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Peserta</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-6">
    <!-- <a href="{{ url('adminpeserta/tambah') }}" class="btn btn-success btn-lg pull-right">Tambah Peserta</a> -->
    <form action="{{ url('/adminpeserta/import') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import Bulk Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export Bulk Data</a>
    </form>
    <!-- <a href="{{ url('/adminpeserta/cetak_pdf') }}" class="btn btn-success btn-lg pull-right">Cetak Username Password</a> -->
  </div>

  <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <form action="{{ url('/adminpeserta/cetak_pdf') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>$tanggal mulai:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal_mulai" class="form-control pull-right" id="datepicker1">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>$tanggal akhir:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal_akhir" class="form-control pull-right" id="datepicker2">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <button class="btn btn-success">Cetak pdf Username Password</button>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <div class="col-md-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Peserta</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <!-- <th>Email</th> -->
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Telp</th>
                  <th>Level</th>
                  <th>Nama Paket</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($peserta as $p)
              		<tr>

              			<td>{{ $p->nama }}</td>
              			<td>{{ $p->username }}</td>
                    <!-- <td>{{ $p->email }}</td> -->
                    <td>{{ $p->password_asli }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->kota }}</td>
                    <td>{{ $p->telp }}</td>
                    <td>{{ $p->level }}</td>
                    <td>{{ $p->nama_paket }}</td>
              			<td>
                      <a href="{{ url('/adminpeserta/cetak_pdf2/'.$p->id) }}">Cetak</a>
                      |
              				<a href="{{ url('adminpeserta/edit/'.$p->id) }}">Edit</a>
              				|
              				<a href="{{ url('adminpeserta/hapus_aksi/'.$p->id) }}">Hapus</a>
              			</td>
              		</tr>
              		@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <!-- <th>Email</th> -->
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Telp</th>
                  <th>Level</th>
                  <th>Nama Paket</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
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
