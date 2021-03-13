@extends('layouts.app')
@section('content')

<div class="auth-container" >
    <div class="container d-flex align-items-center lift-and-drop-shadow justify-content-center" @if(isset($bgimg)) style="background: url({{ asset('assets_app/images/background.jpg') }}); background-position: center center; background-size: cover;" @endif>
       
        <div class="row inner-container justify-content-center">
            <div class="col-md-7 tagline-inverted">
                <div class="row d-flex align-items-end image-holder">
             
                </div>
            </div>
            <div class="col-md-5 auth-form-container">
              
              
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2 class="mb-2 pl-3 pr-3"><b>{{ __('Login to Account') }}</b></h2>
                            <div class="form-group">
                                <div class="col-md-12">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pt-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary  form-control"> {{ __('Login') }} </button>
                                </div>
                            </div>
                        </form>
                
            </div>
        </div>



    </div>
</div>
@endsection
