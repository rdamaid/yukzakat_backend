@extends('auth.layouts.master')
@section('content')
<!-- REGISTER Card -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- REGISTER -->
                <div class="card text-center" style="margin-top: -50px !important">
                    <div class="card-body">
                        <h2 class="card-title pb-2">DAFTAR</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="nama" placeholder="Nama"
                                    :value="old('name')" autocomplete="name" autofocus required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    :value="old('email')" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="pasword"
                                    placeholder="Password" autocomplete="new-password" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" id="pasword"
                                    placeholder="Konfirmasi Password" autocomplete="new-password" required />
                            </div>
                            <button type="submit" class="btn btn-block btn-primary tombol">
                                DAFTAR
                            </button>
                        </form>
                        <h3 class="pt-3">
                            <span>ATAU</span>
                        </h3>
                        <div class="row justify-content-center social-btn">
                            <div class="col-4">
                                <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i> <b> Facebook</b></a>
                            </div>
                            <div class="col-4">
                                <a href="#" class="btn btn-danger"><i class="fa fa-google"></i> <b> Google</b></a>
                            </div>
                        </div>
                        <div class="subtext">
                            Punya akun?
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Login Card -->
@endsection
