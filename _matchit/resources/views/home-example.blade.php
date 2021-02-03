 @extends('layouts.admin')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header"></div>

                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">ID</th>
                             <th scope="col">NAME</th>
                             <th scope="col">CREATED AT</th>
                             <th scope="col">UPDATED AT</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php
                        foreach ($roles as $role) {
                    ?>
                         <tr>
                             <th scope="row">{{ $role->id }}</th>
                             <td>{{ $role->name }}</td>
                             <td>{{ $role->created_at }}</td>
                             <td>{{ $role->updated_at }}</td>
                         </tr>

                         <?php
                        }
                    ?>

                     </tbody>
                 </table>


                 <table class="table mt-5">
                     <thead>
                         <tr>
                             <th scope="col">Role</th>
                             <th scope="col">NAme</th>
                             <th scope="col">Email</th>
                             <th scope="col">User Type </th>
                             <th scope="col">Channel </th>
                             <th scope="col">Status</th>
                             <th scope="col">Created AT</th>
                             <th scope="col">UPDATED AT</th>

                         </tr>
                     </thead>
                     <tbody>

                         <?php
                        foreach ($users as $user) {
                    ?>
                         <tr>
                             <th scope="row">{{ $user->role->name }}</th>
                             <td>{{ $user->name }}</td>
                             <td>{{ $user->email }}</td>
                             <td>{{ $user->userType->name }}</td>
                             <th>{{ $user->channel->name }}</th>
                             <td>{{ $user->status->name }}</td>
                             <td>{{ $user->created_at }}</td>
                             <td>{{ $user->updated_at }}</td>
                         </tr>

                         <?php
                        }
                    ?>

                     </tbody>
                 </table>

                 <div class="card-body">
                     @if (session('status'))
                     <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                     </div>
                     @endif

                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
