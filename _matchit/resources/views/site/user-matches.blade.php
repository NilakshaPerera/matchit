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

    <div class="row lift-and-drop-shadow height-pages">

        @if (count($matches['data']) > 0)

        <div class="col-md-12">

            <h3 class="text-center mt-4 mb-4 b">Here are your matches based on your profile!</h3>
            <div class="row">
                @foreach ($matches['data'] as $person)
                <div class="col-md-4 profiling-block mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="img-holder" style="background-image: url({{ $person['profile_pic'] }})"></div>

                                <div class="row">
                                    <div class=" col-md-12 basic-data text-center mt-2">
                                        <h3><b>{{ $person['name'] }}</b></h3>
                                    </div>
                                </div>
                                <hr class="m-1">
                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Personality &nbsp; 
                                    </div>
                                    <div class=" col-7 text-left p-0">
                                        @foreach ($person['personality'] as $p)
                                            <span class="badge badge-secondary">{{ $p }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Hobbies &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0">
                                        @foreach ($person['hobby'] as $h)
                                            <span class="badge badge-secondary">{{ $h }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="m-1">

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Gender &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0 b">
                                        {{$person['gender']}}
                                    </div>
                                </div>

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Interested In &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0 b">
                                        {{$person['prefered_gender']}}
                                    </div>
                                </div>

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Age &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0 b">
                                        <?php
                                            $today = Carbon::now();
                                            $expireDate = Carbon::createFromFormat('Y-m-d', $person['dob']);
                                            $difference = $today->diffInYears($expireDate, true);
                                        ?>
                                        {{ $difference}}
                                    </div>
                                </div>

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Contact &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0 b">
                                        {{$person['phone']}}
                                    </div>
                                </div>

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Email &nbsp;
                                    </div>
                                    <div class=" col-7 text-left p-0 b" >
                                        {{$person['email']}}
                                    </div>
                                </div>

                                <hr class="m-1">

                                <div class="row personality-data">
                                    <div class=" col-5 text-right p-0">
                                        Match Rate &nbsp;
                                    </div>
                                    <div class="col-7 text-left p-0 b match-rate-data">
                                        {{ $person['total_score'] }}%
                                    </div>
                                </div>

                            </div>
                            <?php 
                         
                        ?>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        @else
        <div class="col-md-12 text-center mt-5 ">
            <h2>Unfortunately, we cannot find any matches to your profile. You can try adding more details..</h2>
        </div>
        @endif

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
    $(document).ready(function () {

        $('.jstable').DataTable({
            responsive: true,
            dom: "Blfrtip",
            buttons: [{
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
        });
    });

</script>

@endsection
