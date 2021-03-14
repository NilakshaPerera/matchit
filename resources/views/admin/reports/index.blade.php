@extends('layouts.admin')

@section('css')

<!-- Data tables common -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!-- Data tables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
<!-- Data Tables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

@endsection

@section('theme-script')
    <script src="{{ asset('assets_theme/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets_theme/js/plugins/forms/styling/uniform.min.js') }}"></script>
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
@endsection

@section('script')
    <script src="{{ asset('assets_theme/js/demo_pages/form_layouts.js') }}"></script>

    <script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


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


            $('#report_type').on('change', function() {
                var url = base + '/admin/reports/' + this.value ;
                location.href =  url;
            });


        } );
    </script>
@endsection

@section('content')


<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
       Generate Reports
    </h6>
    <span class="text-muted d-block">Select any report from the list and generate data</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frmReports" name="frmReports" method="POST" action="{{ route('report.get') }}" enctype="">
                            
                            @csrf

                            <div class="form-group">
                                <label>Report Type</label>
                                <select name="report_type" id="report_type" data-placeholder="Select the report type" class="form-control form-control-select2 @error('report_type') is-invalid @enderror" data-fouc>
                                        <option value="">-- Select Report Type --</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::EventSchedule)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::EventSchedule }}">Event Schedule Report</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::Income)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::Income }}">Events Income Report</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::MemberMatches)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::MemberMatches }}">SuccessfulMember Matches</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::Payments)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::Payments }}">Membership Payments Report</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::Overdueletter)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::Overdueletter }}">Payment Overdue Letters</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::Pastevents)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::Pastevents }}">Past Events Report</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::ClientServiceAgentMeetup)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::ClientServiceAgentMeetup }}">Client Service Agent Meetups</option>
                                        <option {{ ($type ==  \App\Providers\AppServiceProvider::UnsuccessfulMemberMatches)? "selected" : ''  }} value="{{ \App\Providers\AppServiceProvider::UnsuccessfulMemberMatches }}">Unsuccessful Member Matches</option>

                                </select>
                                @error('report_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {!! $template !!}

                            @if(session()->has('message'))
                                <div class="alert alert-success mt-3 text-center">
                                    {{ session()->get('message') }}
                                 </div>
                            @endif
                            @if(session()->has('error'))
                             <div class="alert alert-warning mt-3 text-center">
                                {{ session()->get('error') }}
                             </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection


