@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')


<div class="container page-home">
    <form action="{{ route('payment.create') }}" method="POST">
        <div class="row d-flex justify-content-center">


            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-6 mb-3">

                        <div class="form-row">
                            <div class="col">
                                <label for="card_number">Card Number</label>
                                <input type="text" class="form-control" id="card_number" name="card_number" aria-describedby="emailHelp" placeholder="0000  0000  0000  0000">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="card_expiry">Expiry Date</label>
                                <input type="text" class="form-control" id="card_expiry" name="card_expiry"
                                    aria-describedby="emailHelp" placeholder="MM  / YY ">
                            </div>
                            <div class="col">
                                <label for="card_cvc">CVC</label>
                                <input type="text" class="form-control" id="card_cvc" name="card_cvc" aria-describedby="emailHelp" placeholder="Enter CVC">
                            </div>

                            <input type="hidden" name="price" id="price" value="{{ $price }}">
                            <input type="hidden" name="paytype" id="paytype" value="{{ $payType }}">
                            <input type="hidden" name="id" id="id" value="{{ $id }}">

                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="card text-center" style="">
                            <div class="card-body">
                                <h5 class="card-title">Make Payment</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Total ammount for the {{ $payType }}</h6>

                                <div class="row mt-3 mb-3">
                                    <div class="col-6">
                                        <h5>Total Due</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>{{ $price }}£</h5>
                                    </div>

                                </div>

                                <input type="submit" class="btn btn-primary" value="Checkout">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
    </form>

</div>
</div>

@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
    $(document).ready(function () {
        $("#card_expiry").inputmask({
            "mask": "99/99"
        });
        $("#card_number").inputmask({
            "mask": "9999 9999 9999 9999"
        });
        $("#card_cvc").inputmask({
            "mask": "999"
        });
    });

</script>
@endsection
