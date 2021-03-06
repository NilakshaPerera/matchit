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
        View Users in the System
    </h6>
    <span class="text-muted d-block">View all your users here</span>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">         
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>Roles</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>User-Type</th>
                            <th>Channel</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ ($user->user_types_id)? $user->userType->name : "N/A" }}</td>
                            <td>{{ ($user->channels_id)? $user->channel->name : "N/A" }}</td>
                            <td>{{ ($user->status_id)? $user->status->name : "N/A" }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('client.edit',[$user->id]) }}">Edit</a></td>
                            </tr>
                        @endforeach                
                    </tbody>
                </table>
        </div>
        </div>
    </div>
</div>
@endsection
