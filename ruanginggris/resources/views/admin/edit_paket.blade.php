@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Edit Paket
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Paket</li>
    <li> Edit Paket</li>
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

        <form method="post" action="{{ url('/adminpaket/update_aksi') }}" enctype="multipart/form-data">
          @csrf
          @foreach($paket as $p)
          <input type="hidden" name="id_paket" class="form-control" value="{{ $p->id_paket }}">
          <!-- {{ csrf_token() }} -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Paket</label>
              <select class="form-control" name="nama_paket">
                <option disabled="">Pilihan Paket Awal {{ $p->nama_paket }}</option>
                @foreach($grubpaket as $p2)
                 <option name="{{ $p2->nama_paket }}">{{ $p2->nama_paket }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Buku</label>
              <input type="text" name="buku" class="form-control" id="exampleInputPassword1" value="{{ $p->buku }}" required="">
            </div>
          </div>
          @endforeach

          <!-- /.box-body -->
          <div id="success"></div>
          <div class="box-footer">
            <button type="submit" name="upload" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




<!-- /.content -->
@endsection
<!-- DataTables -->
