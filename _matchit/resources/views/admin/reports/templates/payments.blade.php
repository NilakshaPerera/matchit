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
                            <td>{{ $payments->name}}</td>
                            <td>{{ $payments->paymentstatus	->name}}</td>
                            <td>{{ $payments->date}}</td>
                            <td>{{ $payments->amount}}</td>
                            <td>{{ $payments->reference_no}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>