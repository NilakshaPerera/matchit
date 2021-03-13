<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">   
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>Amount paid</th>
                            <th>Total income</th>
                            <th>Date created</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->users_id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->date }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
