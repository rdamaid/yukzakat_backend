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
                            <div class="form-group has-feedback">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Email" :value="old('email')" required autofocus />
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="pasword"
                                    placeholder="Password" autocomplete="current-password" required />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="block">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color:black">
                                    {{ __('Lupa password?') }}
                                </a>
                                @endif
                                <button type="submit" class="btn btn-block btn-primary tombol mt-2">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>

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
