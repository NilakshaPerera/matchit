<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class UserControllerTest extends TestCase
{
        // php artisan test --filter UserControllerTest
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexUser()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('user'));

        $response->assertStatus(200);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testShowUser()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('user.all'));

        $response->assertStatus(200);
    }

    
    
}