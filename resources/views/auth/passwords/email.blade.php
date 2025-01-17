@extends('layouts.app')
@section('content')


<div class="auth-container">
    <div class="container d-flex align-items-center justify-content-center lift-and-drop-shadow" @if(isset($bgimg)) style="background: url({{ asset('assets_app/images/background.jpg') }}); background-position: center center; background-size: cover;" @endif>
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
              
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h2 class="mb-2 pl-3 pr-3"><b>{{ __('Reset Password') }}</b></h2>



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




                        <div class="form-group mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                

            </div>
        </div>
    </div>
</div>
@endsection

