@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')


<div class="container page-home">
    <div class="row ">
        <div class="col-md-12">

            @include('site.profilenav')

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('user.update') }}">
                      @csrf
                      <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                      <h4 class="mt-3"><b>Basic Details</b></h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="name">Name</label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label for="phone">Phone</label>
                              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" placeholder="{{ __('Phone Number') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="email">email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="email">Birthday</label>
                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->dob }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="birthday">
                            @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="email">User Type</label>
                          <select required id="user_type"  class="form-control @error('user_type') is-invalid @enderror mr-3" name="user_type" required autocomplete="user_type">
                            <?php 
                                foreach (  $userTypes as $type) {
                            ?>
                                <option {{ ($user->user_types_id == $type->id)? 'selected': ""  }} id="type-{{ $type->name }}" value="{{ $type->id }}">{{ $type->name }}</option>
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


                        <div class="form-group col-md-6">
                          <label for="phone">Address</label>
                          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" placeholder="{{ __('Address') }}" required autocomplete="address" autofocus>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                      <h4 class="mt-3"><b>Personality Details</b></h4>

                      <div class="form-row">
                        <div class="form-group col-md-12">

                          <?php 
                            $personalityDs = $user->usershaspersonalitydetail->pluck('personality_details_id')->toArray();
                          ?>

                          <select name="personality-details[]" multiple="multiple" id="personality-details[]"  class="form-control select2-basic-multiple @error('personality-details') is-invalid @enderror" name="personality-details" placeholder="{{ __('Personality Details') }}" autocomplete="personality-details">
                            @foreach ($personalityDetails as $personalityDetail)
                              <option {{ (in_array(  $personalityDetail->id, $personalityDs ))? "selected" : ""  }}  id="personality-detail-{{ $personalityDetail->id }}" value="{{ $personalityDetail->id }}">{{ $personalityDetail->name }}</option>
                            @endforeach
                          </select>
                          @error('personality-details')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                    </div>

                    <h4 class="mt-3"><b>Hobby Details</b></h4>

                    <div class="form-row">
                      <div class="form-group col-md-12">

                        <?php 
                          $hobbyDs = $user->userhashobby->pluck('hobbies_id')->toArray();
                        ?>

                        <select id="hobby-details[]" multiple="multiple" class="form-control select2-basic-multiple @error('hobby-details') is-invalid @enderror" name="hobby-details[]" placeholder="{{ __('Hobby Details') }}"  autocomplete="hobby-details">
                          @foreach ($hobbies as $hb)
                            <option {{ (in_array( $hb->id , $hobbyDs  ))? "selected" : ""  }} id="hobby-{{ $hb->id }}" value="{{ $hb->id }}">{{ $hb->name }}</option>
                          @endforeach
                        </select>
                          @error('hobby-details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </div>


                      <h4 class="mt-3"><b>Password Details</b></h4>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="password-old">Old Password</label>
                          <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="{{ __('Old Password') }}"  autocomplete="old_password">
                          @error('old_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="password">New Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('New Password') }}"  autocomplete="password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="password_confirmation">Re-type New Password</label>
                          <input id="password_confirmation" type="password" class="form-control" name="password_confirmationation" placeholder="{{ __('Confirm Password') }}"  autocomplete="password_confirmation">
                        </div>
                    </div>


                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        @if(session()->has('message'))
                        <div class="alert alert-success mt-3 text-center">
                            {{ session()->get('message') }}
                         </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-warning mt-3 text-center">
                            {{ session()->get('error') }}
                        </div>
                        @endif

                    </form>
                </div>
            </div>

















        </div>
    </div>
</div>

@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.select2-basic-multiple').select2();
});

</script>
@endsection