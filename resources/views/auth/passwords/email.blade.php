@extends('auth.layouts.master')
@section('content')
<!-- Login Card -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title pb-2">RESET PASSWORD</h2>
                        <!-- LOGIN -->
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form form method="POST" action="{{ route('password.email') }}">
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
                            <div>
                                <button type="submit" class="btn btn-block btn-primary tombol mt-2">
                                {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Login Card -->

@endsection