<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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
        $this->assertIsInt($result);
    }
}
