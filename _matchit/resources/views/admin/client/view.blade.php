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
        View all your events
    </h6>
    <span class="text-muted d-block">Add or view all your events here</span>
</div>

<div class="row">

    <div class="col-md-12">

        <div class="card">
            <div class="card-body">
                Created Event records
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
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
                            <th>Created AT</th>
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
                        </tr>
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>


@endsection
