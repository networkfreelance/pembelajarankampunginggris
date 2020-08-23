@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Admin
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">admin</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
    <!-- <a href="{{ url('adminadmin/tambah') }}" class="btn btn-success btn-lg pull-right">Tambah admin</a> -->
    <form action="{{ url('admin/import') }}" method="POST" name="importform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Import Bulk Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export Bulk Data</a>
    </form>
  </div>
  <div class="col-md-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar admin</h3>

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
                  @foreach($admin as $p)
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
              				<a href="{{ url('adminadmin/edit/'.$p->id) }}">Edit</a>
              				|
              				<a href="{{ url('adminadmin/hapus_aksi/'.$p->id) }}">Hapus</a>
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
