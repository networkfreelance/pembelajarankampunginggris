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
    <li class="active"> Edit Materi</li>
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
         @foreach($materi as $m)
        <form method="post" action="{{ url('admin_materi_aksi_edit') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id_materi" class="form-control" value="{{ $m->id_materi }}">
          <input type="hidden" name="video" class="form-control" value="{{ $m->video }}">
          <input type="hidden" name="id_paket" class="form-control" value="{{ $id_paket }}">
          <div class="box-body">
            <div class="form-group">
              <label>Nama Materi</label>
              <input type="text" name="materi" class="form-control" value="{{ $m->nama_materi }}">
            </div>
            <div class="form-group">
              <label>Konten</label>
              <input type="text" name="konten" class="form-control" value="{{ $m->konten }}">
            </div>
            <div class="form-group">
              <label>URL Video</label>
              <input type="text" name="urlvideo" class="form-control" value="{{ $m->video }}">
            </div>
           <!--  <div class="form-group">
              <label>File Upload</label>
              <input type="file" name="file" id="file">
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
        @endforeach
      </div>
      </div>
    </div>
  </section>




  <!-- /.content -->
  @endsection
  <!-- DataTables -->
