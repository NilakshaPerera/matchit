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