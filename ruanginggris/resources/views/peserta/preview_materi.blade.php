@extends('layout')

@section('konten')
<!-- Content Header (Page header) -->
<style>
video {
  width: 100%    !important;
  height: auto   !important;
}
</style>
<!-- Main content -->
<section class="content">

  <div class="row">
@foreach($materi as $p)
    <!-- /.col -->
    <div class="col-md-8">
      <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="{{ url('/foto_profil/avatar.png') }}" alt="User Image">
                <span class="username"><a href="#">Judul Materi : {{ $p->nama_materi }}.</a></span>
                <span class="description">Shared publicly {{ $p->tanggal_publikasi }}</span>
              </div>
              <!-- /.user-block -->
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="--aspect-ratio: 16/9;">
                <iframe src="{{ $p->video }}" width="1600" height="900" frameborder="0"></iframe>
                {{ $p->video }}
              </div>
              <hr>
              <p>{{ $p->konten }}</p>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>


      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
      <a href="{{ url('/pesertakelas') }}" class="btn btn-block btn-danger btn-lg">Kembali ke Daftar Materi</a>
    </div>
@endforeach

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
