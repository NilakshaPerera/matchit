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
              
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="mb-2 pl-3 pr-3"><b>{{ __('Create New Account') }}</b></h2>

                        <div class="form-group ">
                            <div class="col-md-12 mb-1-on-mobile">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('First Name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 mb-1-on-mobile">
                                <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  ">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <h4 for="birthday" class=""><b>{{ __('Birthday') }}</b></h4>

                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" placeholder="{{ __('birthday') }}" value="{{ old('birthday') }}" required autocomplete="birthday">
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <h4 for="user_type" class=""><b>{{ __('Where do you live') }}</b></h4>

                                <select required id="user_type" value="{{ old('user_type') }}" class="form-control @error('user_type') is-invalid @enderror mr-3" name="user_type" required autocomplete="user_type">
                                    <?php 
                                        foreach (  \App\UserType::all() as $type) {
                                    ?>
                                        <option id="type-{{ $type->name }}" value="{{ $type->id }}">{{ $type->name }}</option>
                                    <?php 
                                        } 
                                    ?>
                                </select>

                                @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                

            </div>
        </div>
    </div>
</div>
@endsection

