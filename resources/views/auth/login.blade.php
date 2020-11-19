@extends('auth.layouts.master')
@section('content')
<!-- Login Card -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title pb-2">MASUK</h2>
                        <!-- LOGIN -->
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    :value="old('email')" required autofocus />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="pasword"
                                    placeholder="Password" autocomplete="current-password" required />
                            </div>
                            <div class="block">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="remember">
                                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                                @endif
                                <button type="submit" class="btn btn-block btn-primary tombol">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <h3 class="pt-3">
                            <span>ATAU</span>
                        </h3>
                        <div class="row justify-content-center social-btn">
                            <div class="col-5">
                                <a href="/template/pages/sites/profil.html" class="btn btn-primary"><i
                                        class="fa fa-facebook"></i> <b>Facebook</b></a>
                            </div>
                            <div class="col-5">
                                <a href="/template/pages/sites/profil.html" class="btn btn-danger"><i
                                        class="fa fa-google"></i> <b> Google</b></a>
                            </div>
                        </div>
                        <div class="subtext">
                            Belum Punya akun?
                            <a href="/register"> Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Login Card -->

@endsection
