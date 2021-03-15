@extends('layouts.admin')
@section('content')

<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
       Accept Payments
    </h6>
    <span class="text-muted d-block">View all due membership payments here</span>
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