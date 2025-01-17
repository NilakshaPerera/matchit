@extends('layouts.admin')

@section('css')

@endsection

@section('theme-script')
    <script src="{{ asset('assets_theme/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets_theme/js/plugins/forms/styling/uniform.min.js') }}"></script>
@endsection

@section('script')
    <script src="{{ asset('assets_theme/js/demo_pages/form_layouts.js') }}"></script>
@endsection

@section('content')


<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
        Create Clients
    </h6>
    <span class="text-muted d-block">Add or view all clients here</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="form-group">
                                <label>Select role of user</label>
                                <select name="roles_id" id="roles_id" data-placeholder="Select user role" class="form-control form-control-select2 @error('roles_id') is-invalid @enderror" data-fouc value="{{ old('roles_id') }}">
                                    @foreach($roles as $roles)
                                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
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
                                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter client name" value="{{ old('name') }}">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Client email</label>
                                <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter client email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Client phone</label>
                                <input name="phone" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter client contact" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Password:</label>
                                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password of client" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="dob" id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" placeholder="Enter client date of birth" value="{{ old('dob') }}">
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Client address</label>
                                <input name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter client address" value="{{ old('address') }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Select user type </label>
                                <select name="users_types_id" id="users_types_id" data-placeholder="Select user type" class="form-control form-control-select2 @error('users_types_id') is-invalid @enderror" data-fouc value="{{ old('users_types_id') }}">
                                    @foreach($userTypes as $userType)
                                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                    @endforeach
                                </select>
                                @error('users_types_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Select a channel</label>
                                <select name="channels_id" id="channels_id" data-placeholder="Select a channel" class="form-control form-control-select2 @error('channels_id') is-invalid @enderror" data-fouc value="{{ old('channels_id') }}">
                                    @foreach($channels as $channels)
                                        <option value="{{ $channels->id }}">{{ $channels->name }}</option>
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
                                <select name="status_id" id="status_id" data-placeholder="Select a status" class="form-control form-control-select2 @error('status_id') is-invalid @enderror" data-fouc value="{{ old('status_id') }}">
                                    @foreach($status as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            


                        



                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
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
