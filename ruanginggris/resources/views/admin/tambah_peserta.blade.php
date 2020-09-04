@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Tambah Peserta
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Tambah Peserta</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->

        <form method="post" action="{{ url('/adminpeserta/tambah_peserta_aksi') }}" enctype="multipart/form-data">
          @csrf
          <!-- {{ csrf_token() }} -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Order ID</label>
              <input type="text" name="order_id" class="form-control" id="exampleInputPassword1" placeholder="Order ID" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Paket</label>
                  <select class="form-control" name="nama_paket">
                    <option>--- Pilih Paket Peserta ---</option>
                    @foreach($grubpaket as $p)
                         <option name="{{ $p->nama_paket }}">{{ $p->nama_paket }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Expired Login</label>
              <input type="date" name="tgl" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Expired Login" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email Aktif" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kota</label>
              <input type="text" name="kota" class="form-control" id="exampleInputPassword1" placeholder="Kota" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telp</label>
              <input type="text" name="telp" class="form-control" id="exampleInputPassword1" placeholder="Telp" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Foto</label>
              <input type="file" name="file" class="form-control" id="exampleInputPassword1" placeholder="Foto" required="">
            </div>
          </div>
          <!-- /.box-body -->
          <div id="success"></div>
          <div class="box-footer">
            <button type="submit" name="upload" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  @endsection
  <!-- DataTables -->
