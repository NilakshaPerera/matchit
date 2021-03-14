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
@endsection

@section('content')


<div class="mb-3">
    <h6 class="mb-0 font-weight-semibold">
        Edit the Selected Hobby
    </h6>
    <span class="text-muted d-block">Edit Hobby Here</span>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form method="POST" action="{{ route('hobby.update') }}">
                            
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $hobby->id }}">
                      
                            <div class="form-group">
                                <label>Hobby Name:</label>
                                <input name="name" id="name" value="{{ $hobby->name }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter a hobby name">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                            <div class="text-right">
                                <a type="button" href="{{ route('hobby.index') }}" class="btn btn-primary">Back</i></a>
                                <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
                            </div>

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
