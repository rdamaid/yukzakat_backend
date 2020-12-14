@extends('auth.layouts.master')
@section('content')
<!-- REGISTER Card -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- REGISTER -->
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title pb-2">DAFTAR</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="nama" placeholder="Nama"
                                    :value="old('name')" autocomplete="name" autofocus required />
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Email"
                                    :value="old('email')" required />
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password" autocomplete="new-password" required minlength="8"/>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" id="password"
                                    placeholder="Konfirmasi Password" autocomplete="new-password" required minlength="8"/>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary tombol">
                                DAFTAR
                            </button>
                        </form>
                       
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
