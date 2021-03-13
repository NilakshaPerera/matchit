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
}
