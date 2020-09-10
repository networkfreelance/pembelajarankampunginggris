@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Tambah Materi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Materi</li>
    <li class="active"> Lihat Materi</li>
    <li class="active"> Tambah Materi</li>
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

        <form method="post" action="{{ url('admin_aksi_materi_tambah') }}" enctype="multipart/form-data">
          @csrf
          <!-- {{ csrf_token() }} -->
          <input type="hidden" name="id" class="form-control" value="{{ $id_paket }}">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Materi</label>
              <input type="text" name="materi" class="form-control" id="exampleInputEmail1" placeholder="Materi" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Konten</label>
              <input type="text" name="konten" class="form-control" id="exampleInputPassword1" placeholder="Konten" >
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">URL Video</label>
              <input type="text" name="urlvideo" class="form-control" id="exampleInputPassword1" placeholder="URL Video Materi" >
            </div>
            <!-- <div class="form-group">
              <label>File Upload</label>
              <input type="file" name="file" id="file" required="">
              <div class="help-block">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                </div>
              </div>
            </div> -->
          </div>
          <!-- /.box-body -->
          <div id="success"></div>
          <div class="box-footer">
            <button type="submit" name="upload" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </section>




  <!-- /.content -->
  @endsection
  <!-- DataTables -->
