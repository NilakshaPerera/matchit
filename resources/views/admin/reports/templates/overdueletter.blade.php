
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">   
                <table class="table table-striped jstable">
                    <thead>
                        <tr>
                            <th>Client name</th>
                            <th>Overdue amount</th>
                            <th>Last payment date</th>
                            <th>Date printed</th>
                            <th>Reference.no</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->users_id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->reference_no }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>