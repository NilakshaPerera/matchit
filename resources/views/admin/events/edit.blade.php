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
        Update Events
    </h6>
    <span class="text-muted d-block">Update all events here</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('events.update') }}">
                            <input type="hidden" name="event_id" id="event_id" value="{{$event->id}}">

                            @csrf
                            <div class="form-group">
                                <label>Enter Event name:</label>
                                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter event name" value="{{ $event->name }}">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            

                            <div class="form-group">
                                <label>Select event type </label>
                                <select name="event_type" id="event_type" data-placeholder="Select event type" class="form-control form-control-select2 @error('event_type') is-invalid @enderror" data-fouc value="">
                                    @foreach($eventTypes as $eventType)
                                        <option {{ ($event->event_types_id == $eventType->id)? "selected" : "" }}value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label>Date</label>
                                <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Enter event date " value="{{ $event->date }}">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price" value="{{ $event->price }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Venue</label>
                                <input name="venue" id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" placeholder="Enter venue " value="{{ $event->venue }}">
                                @error('venue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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