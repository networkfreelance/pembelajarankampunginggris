@extends('layout')
@section('konten')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tutorial Login, Register, Validasi dengan Laravel 5.4</h1>
            <p>Hallo, {{Session::get('name')}}. Apakabar?</p>
            <p>Level, {{Session::get('level')}}</p>
            @php
            $tanggal=date('Y-m-d');
            $pinjam            = date("Y-m-d");
            $tujuh_hari        = mktime(0,0,0,date("n"),date("j")+90,date("Y"));
            echo 'expired login : '.$kembali      = date("Y-m-d", $tujuh_hari);
            @endphp
            <h2>* Email kamu : {{Session::get('email')}}</h2>
            <h2>* Status Login : {{Session::get('login')}}</h2>
            <a href="{{ url('/logoutku') }}" class="btn btn-primary btn-lg">Logout</a>

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
