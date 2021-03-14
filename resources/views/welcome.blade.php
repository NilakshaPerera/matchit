@extends('layouts.app')

@section('content')
<div class="container page-home lift-and-drop-shadow">
    <div class="row justify-content-center">
        <div class="col-md-12 card">

           @includeIf('site.partials.banner')

            <h2 class="text-center mt-4 mb-4"><b>Upcoming Events</b></h2>
            <div class="row ">
                <?php
                    $events = \App\Event::all();
                ?>
                @foreach ($events as $event)
                <?php
                $booking = false;
                    if(Auth::user()){

                    $booking = \App\Booking::where('users_id' , Auth::user()->id )
                            ->where('events_id' , $event->id )
                            ->first();
                    }
                ?>
                <div class="col-md-4">
                    <div class="card event-item" style="">
                        <a href="#!">
                            <div class="card-img-top" style="background-image: url('{{url($event->banner)}}');">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">Fee : {{ $event->price }}£ </p>
                            <p class="card-text">On : {{ $event->date }} </p>
                            <p class="card-text">Venue : {{ $event->venue }} </p>
                            <p class="card-info">Tags :
                                <span class="badge badge-primary">{{ $event->eventType->name }}</span>
                            </p>
                            <p class="card-action text-center">
                                <?php 
                                    $today = Carbon::now();

                                    $expireDate = Carbon::createFromFormat('Y-m-d', $event->date);
                                    $difference = $today->diffInDays($expireDate, false);  

                                    if($difference > 0){ 

                                    $route = ( Auth::user())? (route('payment', [Auth::user()->id , 'event', $event->id])) : route('login');
                                    if(!$booking){
                                ?>
                                <a href="{{ $route  }}" class="btn btn-dark">Book Event</a>
                                <?php 
                                    } 
                                    else{
                                ?>
                                <a href="!#" class="btn btn-dark disabled">You already booked this event</a>
                                <?php 
                                    }
                                    }else{
                                ?>
                                    <a class="btn btn-error disabled">This event is expired</a>
                                    <?php 
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection


@section('script')

<?php if (session('paymentSuccess')) { ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    alertError();

    function alertError() {
        Swal.fire({
            title: 'Payment Successful!',
            text: '{{session('
            paymentSuccess ')}}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }

</script>
<?php } ?>
@endsection
