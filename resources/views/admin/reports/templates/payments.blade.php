<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">   
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Payment status</th>
                            <th>Date</th>
                            <th>Amount £</th>
                            <th>Reference no</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->user->name}}</td>
                            <td>{{ $payment->paymentstatus->name}}</td>
                            <td>{{ $payment->date}}</td>
                            <td>{{ $payment->amount}}</td>
                            <td>{{ $payment->reference_no}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>