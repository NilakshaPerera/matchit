<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class NilakshaTest extends TestCase
{
    use WithoutMiddleware;
    // php artisan test --filter NilakshaTest


    /**
     * Created By : Nilaksha 
     * Summary Tests the user update feature 
     *
     * @return void
     */
    public function testGetMatches()
    {
        $userController = new UserController();
        $result = $userController->getMatches(1);
        $this->assertTrue($result['success']);
    }


    /**
     * Created By : Nilaksha 
     * Summary Tests the user update feature 
     *
     * @return void
     */
    public function testGetMembershipDues()
    {
        $userController = new UserController();
        $result = $userController->getMembershipDues(1);
        $this->assertGreaterThan(-1, (float)$result);
    }

    /**
     * Created By : Nilaksha 
     * Summary Tests Create a booking record
     *
     * @return void
     */
    public function testCreatePayment()
    {
        $bookingController = new BookingController();
        $result = $bookingController->create([
            'users_id' => 1,
            'events_id' => 1,
            'channel_id' => 5,
            'payments_id' => 1,
            'date' => date('y-m-d'),
        ]);
        $this->assertIsInt($result->id);
    }

    /**
     * Created By : Nilaksha 
     * Summary Tests Get last payment made data
     *
     * @return void
     */
    public function testGetLastPaymentDate(){
        $userController = new UserController();
        $result = $userController->getLastPaymentDate(1);
        $this->assertNotEmpty($result);
    }

}
