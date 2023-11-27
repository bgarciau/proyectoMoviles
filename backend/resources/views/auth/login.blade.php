@extends('layouts.app')

@section('content')
<body style="background-image: url('https://i.pinimg.com/originals/88/73/85/88738596c6a87cf1ed4c121193e81a10.jpg'); background-size: cover; background-position: 50% 5%; background-color: #0f0c0cef;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(255, 71, 71, 0.8); border-radius: 15px; box-shadow: 0 4px 8px rgba(196, 16, 16, 0.801);">
                    <div class="card-header" style="background-color: rgba(238, 224, 34, 0.897); color: rgb(245, 9, 9); font-family: 'Century Gothic'; font-weight: bold;">{{ __('Login') }}</div>

                    <div class="card-body" style="border-radius: 15px; background-color: rgba(255, 71, 71, 0.8); color: white; font-family: 'Century Gothic'; font-weight: bold;" >
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3" >
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: rgb(179, 8, 8); border-color:rgb(255, 0, 0)" >
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
