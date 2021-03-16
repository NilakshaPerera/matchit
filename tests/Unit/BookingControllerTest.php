<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class BookingControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexBooking(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('booking.index'));

        $response->assertStatus(200);

    }

    public function testsendeventdetailsBooking(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $data = array(
            '_token' => csrf_token()
        );

        $response = $this->actingAs($user)
                         ->post(route('bookings.sendeventdetails'), $data);
        
        $response->assertStatus(200);

    }
}
