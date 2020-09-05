@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Tambah Paket
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Tambah Paket</li>
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

        <form method="post" action="{{ url('/adminpaket/tambah_aksi') }}" enctype="multipart/form-data">
          @csrf
          <!-- {{ csrf_token() }} -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Paket</label>
                  <select class="form-control" name="nama_paket">
                    <option>--- Pilih Paket ---</option>
                    @foreach($paket as $p)
                         <option name="{{ $p->nama_paket }}">{{ $p->nama_paket }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Buku</label>
              <input type="text" name="buku" class="form-control" id="exampleInputPassword1" placeholder="Buku" required="">
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
