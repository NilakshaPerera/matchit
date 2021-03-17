<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class AcceptPaymentControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Created At : 17/3/2021
     * Created By : Imesha
     * Summary : test show due payments and test send due membership notification
     *
     * @return void
     */
    public function testShowDuePayment()
    {
        $this->withMiddleware();

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
            ->get(route('payment.getall'));

        $response->assertStatus(200);
    }
  

    public function testsendduemembershipnotification()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $data = array(
            '_token' => csrf_token()
        );

        $response = $this->actingAs($user)
            ->post(route('payment.sendduemembershipnotification'), $data);

        $response->assertStatus(200);
    }

}

