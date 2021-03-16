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
        Accept Bookings
    </h6>
    <span class="text-muted d-block">Send Emails to clients</span>
</div>
<div class="row">
<div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('bookings.sendeventdetails') }}">
                            
                            @csrf

                            <div class="form-group">
                                <label>Select User</label>
                                <select name="user_id" id="user_id" data-placeholder="Select User" class="form-control form-control-select2 @error('user_id') is-invalid @enderror" data-fouc>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Event Type</label>
                                <select name="event_types_id" id="event_types_id" data-placeholder="Select Event" class="form-control form-control-select2 @error('event_types_id') is-invalid @enderror" data-fouc>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_types_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary m-3" >Send Email <i class="icon-envelope ml-2"></i></button>
                            </div>

                            @if(session()->has('error'))
                             <div class="alert alert-warning mt-3 text-center">
                                {{ session()->get('error') }}
                             </div>
                            @endif

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
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