<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BookingControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexBooking()
    {
        $this->withMiddleware();

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
            ->get(route('booking.index'));

        $response->assertStatus(200);
    }


   /**
     * Created At : 16/03/2021
     * Created By : Mujitha
     * Summary : Test Send event details email notification function
     *
     * @return void
     */
    public function testSendEventBookingDetails()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $data = array(
            '_token' => csrf_token()
        );

        $response = $this->actingAs($user)
            ->post(route('bookings.sendeventdetails'), $data);

        $response->assertStatus(200);
    }

}
