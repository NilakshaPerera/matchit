@extends('layouts.app')

@section('content')
<div class="container page-home">
    <div class="row justify-content-center">
        <div class="col-md-12 card">


            <h3 class="text-center mt-2 mb-2"><b>Upcoming Events</b></h3>

            <div class="row ">

                <?php

                $events = \App\Event::all();

                ?>

                @foreach ($events as $event) 
                <div class="col-md-4">
                    <div class="card event-item" style="">
                        <a href="#!">
                            <div class="card-img-top" style="background-image: url('{{url('/assets_app/images/1.jpeg')}}');">
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Event Camping</h5>
                            <p class="card-text">Fee : 150£ </p>
                            <p class="card-info">Tags :
                                <span class="badge badge-primary">Camping</span>
                                <span class="badge badge-primary">Hiking</span>
                                <span class="badge badge-primary">BBQ</span>
                            </p>
                            <p class="card-action text-center">
                                <?php 
                                    $route = ( Auth::user())? (route('payment', [Auth::user() ->id , 'event', $event->id])) : route('login');
                                ?>
                                <a href="{{ $route  }}" class="btn btn-dark">Book Event</a>
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
