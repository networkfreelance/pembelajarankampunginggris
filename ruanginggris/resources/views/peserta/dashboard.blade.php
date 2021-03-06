@extends('layout')

@section('konten')
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<!-- Main content -->
<section class="content">

  <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ count($jumlah_materi) }}</h3>

              <p>Total materi yang anda ikuti</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
  </div>

</section>
<!-- /.content -->
@endsection
<!-- DataTables -->
