@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Tambah User Admin
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Materi</li>
    <li class="active"> Lihat Materi</li>
    <li class="active"> Tambah User Admin</li>
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
@foreach($admin as $a)
        <form method="post" action="{{ url('/adminpeserta/update_aksi') }}" enctype="multipart/form-data">
          @csrf
          <input type="text" name="id" value="{{ $a->id }}" class="form-control" id="exampleInputEmail1" placeholder="Id" required="">
          <!-- {{ csrf_token() }} -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="nama" value="{{ $a->nama }}" class="form-control" id="exampleInputEmail1" placeholder="Nama" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" name="username" value="{{ $a->username }}" class="form-control" id="exampleInputPassword1" placeholder="Username" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" name="email" value="{{ $a->email }}" class="form-control" id="exampleInputPassword1" placeholder="Email" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="text" name="password" value="{{ $a->password_asli }}" class="form-control" id="exampleInputPassword1" placeholder="Password" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" name="alamat" value="{{ $a->alamat }}" class="form-control" id="exampleInputPassword1" placeholder="Alamat" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kota</label>
              <input type="text" name="kota" value="{{ $a->kota }}" class="form-control" id="exampleInputPassword1" placeholder="Kota" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telp</label>
              <input type="text" name="telp" value="{{ $a->telp }}" class="form-control" id="exampleInputPassword1" placeholder="Telp" >
            </div>
            <div class="form-group">
              <label for="inputEmail3">Foto</label>
              <img src="{{ url('/foto_peserta/'.$a->foto) }}" width="100" height="100">
              <div class="col-sm-12">
                <input type="file" name="file" class="form-control" id="exampleInputFile">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div id="success"></div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
  @endforeach
      </div>
      </div>
    </div>
  </section>




  <!-- /.content -->
  @endsection
  <!-- DataTables -->
