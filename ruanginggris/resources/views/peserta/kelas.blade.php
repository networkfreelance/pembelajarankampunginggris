@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Ruang belajar
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Ruang Belajar</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">

  <div class="col-md-6">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Paket</h3>

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
                  <th>Nama Paket</th>
                  <th>Buku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($paket as $p)
                    @foreach($user as $s)
                    @php
                      if($s->nama_paket==$p->nama_paket){
                    @endphp
              		<tr>
              			<td>{{ $p->nama_paket }}</td>
              			<td>{{ $p->buku }}</td>
                    <td>
              				<a href="{{ url('/lihat_materi/'.$p->id_paket) }}">Lihat Materi</a>
              				|

              			</td>
              		</tr>
                    @php
                      }
                    @endphp
                    @endforeach
              		@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Paket</th>
                  <th>Buku</th>
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

    @php
    $id_paket=Request()->id_paket;
    if(!empty($id_paket)){
    @endphp
    <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar materi</h3>

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
                    <th>Nama Materi</th>
                    <th>Konten</th>
                    <th>Tanggal Publikasi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($materi as $p2)
                    <tr>
                      <td>{{ $p2->nama_materi }}</td>
                      <td>{{ $p2->konten }}</td>
                      <td>{{ $p2->tanggal_publikasi }}</td>
                      <td>
                        <a href="{{ url('/preview_materi/'.$p2->id_materi) }}">Preview Materi</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Materi</th>
                    <th>Konten</th>
                    <th>Tanggal Publikasi</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
      </div>
      <!-- /.box-body -->
      <!-- /.box-footer-->
    </div>
  </div>
    <!-- /.box -->
    @php
    }
    @endphp





</div>
</section>
<!-- /.content -->
@endsection
<!-- DataTables -->
