@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4 text-center">
                                {{ __('OR') }}
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('auth', 'facebook') }}" class="btn btn-primary form-control">
                                    <i class="fa fa-facebook pr-2"></i>
                                    <span>
                                        Sign up with Facebook
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('auth', 'github') }}" class="btn btn-dark form-control">
                                    <i class="fa fa-github pr-2"></i>
                                    <span>
                                        Sign up with Github
                                    </span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('auth', 'google') }}" class="btn btn-danger form-control text-light">
                                    <i class="fa fa-google pr-2"></i>
                                    <span>
                                        Sign up with Google
                                    </span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('auth', 'twitter') }}" class="btn btn-info form-control text-light">
                                    <i class="fa fa-twitter pr-2"></i>
                                    <span>
                                        Sign up with Twitter
                                    </span>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection