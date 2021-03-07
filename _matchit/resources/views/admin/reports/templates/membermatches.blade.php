<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php
                dd($data);
                
                ?>
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>User name</th>
                            <th>match</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $member)
                        <tr>
                            <td>{{ $member->user_id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->matches }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>