@extends('layouts.app')

@section('content')
<div class="container page-home lift-and-drop-shadow">
    <div class="row justify-content-center">
        <div class="col-md-12 card">

            <div class="row">

                <div id="carouselExampleIndicators" class="carousel slide home-carousal" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner1.jpg') }}" alt="First slide">
                        <div class="centered text-center darken-background">
                            <h1>Find what you love doing the most</h1>
                            <p>Our service let you meet people who are just like you. Our platform gives you the ability to get in touch with them</p>
                        </div>
                      </div>

                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner2.jpg') }}" alt="Second slide">
                        <div class="centered text-center darken-background">
                            <h1>Join us so we can help you find your type of people</h1>
                            <p>Out platform makes it easy to find interesting people you'd like. Just register with us and complete your profile. Then leave the rest to us :)</p>
                        </div>
                      </div>

                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner3.jpg') }}" alt="Third slide">
                        <div class="centered text-center darken-background">
                            <h1>How can you meet new people ?</h1>
                            <p>We throw events based on your interests and we let you meet others who are just like you.</p>
                              <a class="btn btn-success" href="{{ route('register') }}">Register Now</a>
                        </div>
                      </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

            </div>

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
