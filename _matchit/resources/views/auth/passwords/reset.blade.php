@extends('layouts.app')
@section('content')


<div class="auth-container">
    <div class="container d-flex align-items-center justify-content-center"
        style="background-image: url('{{ url('/images/auth-background.png') }}')">
        <div class="row inner-container justify-content-center">
            <div class="col-md-7 tagline-inverted">
                <div class="row d-flex align-items-end image-holder">
             
                </div>
            </div>
            <div class="col-md-5 auth-form-container">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <h2 class="mb-2 pl-3 pr-3"><b>{{ __('Reset Password') }}</b></h2>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group ">
                            <div class="col-md-12 mb-1-on-mobile">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 mb-1-on-mobile">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 mb-1-on-mobile">
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" value="{{ old('password') }}" placeholder="{{ __('Confirm Password') }}" required autocomplete="password-confirm" autofocus>
                               
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                

            </div>
        </div>
    </div>
</div>
@endsection

