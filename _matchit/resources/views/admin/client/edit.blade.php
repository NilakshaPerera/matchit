@extends('layouts.admin')

@section('css')

@endsection

@section('theme-script')
    <script src="{{ asset('assets_theme/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets_theme/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2-basic-multiple').select2();
        });
    </script>
@endsection

@section('script')
    <script src="{{ asset('assets_theme/js/demo_pages/form_layouts.js') }}"></script>
@endsection

@section('content')


<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
        Update Clients
    </h6>
    <span class="text-muted d-block">Update all clients here</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('user.update') }}">
                            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

                            @csrf

                            <div class="form-group">
                                <label>Select role of user</label>
                                <select name="roles_id" id="roles_id" data-placeholder="Select user role" class="form-control form-control-select2 @error('roles_id') is-invalid @enderror" data-fouc value="{{ $user->roles_id}}">
                                    @foreach($roles as $role)
                                        <option  {{ ($user->roles_id == $role->id)? "selected" : "" }} value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roles_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Enter Client name:</label>
                                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter client name" value="{{ $user->name }}">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                           

                            <div class="form-group">
                                <label>Client email</label>
                                <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter client email" value="{{ $user->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Client phone</label>
                                <input name="phone" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter client contact" value="{{ $user->phone }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                           {{-- <div class="form-group">
                                <label>Password:</label>
                                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password of client" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{ $message }}</strong>
                                </span>
                            @enderror
                            </div> --}}

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="birthday" id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" placeholder="Enter client date of birth" value="{{ $user->dob }}">
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Client address</label>
                                <input name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter client address" value="{{ $user->address }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Select user type </label>
                                <select name="user_type" id="user_type" data-placeholder="Select user type" class="form-control form-control-select2 @error('user_type') is-invalid @enderror" data-fouc value="">
                                    @foreach($userTypes as $userType)
                                        <option {{ ($user->users_types_id == $userType->id)? "selected" : "" }}value="{{ $userType->id }}">{{ $userType->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Select a channel</label>
                                <select name="channels_id" id="channels_id" data-placeholder="Select a channel" class="form-control form-control-select2 @error('channels_id') is-invalid @enderror" data-fouc value="">
                                    @foreach($channels as $channels)
                                        <option {{ ($user->channels_id == $channels->id)? "selected" : "" }}  value="{{ $channels->id }}">{{ $channels->name }}</option>
                                    @endforeach
                                </select>
                                @error('channels_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Select status</label>
                                <select name="status_id" id="status_id" data-placeholder="Select a status" class="form-control form-control-select2 @error('status_id') is-invalid @enderror" data-fouc value="">
                                    @foreach($status as $status)
                                        <option  {{ ($user->status_id == $status->id)? "selected" : "" }} value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update  <i class="icon-paperplane ml-2"></i></button>
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

</div>





@endsection
