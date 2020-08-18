@extends('layout')

@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User profil</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
@foreach($users as $p)
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{ url('/foto_profil/avatar.png') }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ $p->nama }}</h3>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Total Materi</b> <a class="pull-right">
                @php
                $no=0;
                @endphp
                @foreach($paket_materi as $pm)
                  @foreach($paket_user as $ps)
                  @php
                    if($pm->nama_paket==$ps->nama_paket){
                      $no++
                  @endphp
                      {{ $no }}
                  @php
                    }
                  @endphp
                @endforeach
              @endforeach
              </a>
            </li>
            <li class="list-group-item">
              <b>Jumlah Paket</b> <a class="pull-right">{{ count($total_paket) }}</a>
            </li>

          </ul>


        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Nama</strong>

          <p class="text-muted">
            {{ $p->nama }}
          </p>

          <hr>

          <strong><i class="fa fa-book margin-r-5"></i> Username</strong>

          <p class="text-muted">{{ $p->username }}</p>

          <hr>

          <strong><i class="fa fa-book margin-r-5"></i> Email</strong>

          <p>{{ $p->email }}</p>

          <hr>

          <strong><i class="fa fa-book margin-r-5"></i> Alamat</strong>

          <p>{{ $p->alamat }}</p>

          <hr>

          <strong><i class="fa fa-book margin-r-5"></i> Telp</strong>

          <p>{{ $p->telp }}</p>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal" action="{{ url('/pesertaprofil/update_aksi') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id }}"> <br/>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama</label>

              <div class="col-sm-10">
                <input type="text" name="nama" value="{{ $p->nama }}" class="form-control" id="inputName" placeholder="Nama">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Username</label>

              <div class="col-sm-10">
                <input type="text" name="username" value="{{ $p->username }}" class="form-control" id="inputName" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" name="email" value="{{ $p->email }}" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="alamat"  id="inputExperience" placeholder="Alamat">{{ $p->alamat }}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Telp</label>

              <div class="col-sm-10">
                <input type="text" name="telp" value="{{ $p->telp }}" class="form-control" id="inputEmail" placeholder="Telp">
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>


      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
@endforeach
</section>
<!-- /.content -->
@endsection
