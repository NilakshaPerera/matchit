@extends('layouts.admin')

@section('css')

<!-- Data tables common -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!-- Data tables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
<!-- Data Tables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

@endsection

@section('theme-script')
    <script src="{{ asset('assets_theme/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets_theme/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <!-- Data tables common -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- Table Buttons -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <!-- Table Responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
@endsection

@section('script')
    <script src="{{ asset('assets_theme/js/demo_pages/form_layouts.js') }}"></script>

    <script>
        $(document).ready( function () {

            $('.jstable').DataTable( {
                responsive: true,
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
            } );
        } );
    </script>
@endsection

@section('content')


<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
        View all your events
    </h6>
    <span class="text-muted d-block">Add or view all your events here</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('events.create') }}" enctype="multipart/form-data">
                            
                            @csrf
                      
                            <div class="form-group">
                                <label>Enter Event name:</label>
                                <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter an event name">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input name="banner" id="banner" type="file" class="form-input-styled @error('banner') is-invalid @enderror" data-fouc>
                                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                @error('banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Event Type</label>
                                <select name="event_types_id" id="event_types_id" data-placeholder="Select your country" class="form-control form-control-select2 @error('event_types_id') is-invalid @enderror" data-fouc>
                                    @foreach($eventTypes as $eventType)
                                        <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_types_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Price £:</label>
                                <input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Add the price for an event">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Date:</label>
                                <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Add the date of the hosted event">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label>Venue:</label>
                                <input name="venue" id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" placeholder="Add the venue for the event">
                                @error('venue')
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


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">   
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Event Type</th>
                            <th>Price £</th>
                            <th>Date</th>
                            <th>Venue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->eventType->name }}</td>
                            <td>{{ $event->price }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->venue }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
