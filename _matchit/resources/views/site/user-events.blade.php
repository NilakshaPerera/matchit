@extends('layouts.app')

@section('css')

<!-- Data tables common -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!-- Data tables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
<!-- Data Tables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

@endsection


@section('content')


<div class="container page-home">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">   
                    <table class="table table-striped jstable">
                        <thead>
                            <tr>
                                <th>Ref No</th>
                                <th>Event Name</th>
                                <th>Event Type</th>
                                <th>Event Date</th>
                                <th>Venue</th>
                                <th>Price</th>
                                <th>Paid On</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->reference_no }}</td>
                                <td>{{ $payment->booking->event->name }}</td>
                                <td>{{ $payment->booking->event->eventType->name }}</td>
                                <td>{{ $payment->booking->event->date }}</td>
                                <td>{{ $payment->booking->event->venue }}</td>
                                <td>{{ $payment->booking->event->price }}£</td>
                                <td>{{ $payment->date }}</td>
                                <td><a target="_blank" href="{{ route('user-invoice', [ $payment->id ]) }}">Invoice</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection


@section('script')

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
