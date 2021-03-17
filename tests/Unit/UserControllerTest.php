<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class UserControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexUser()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('eventtype.index'));

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

     /**
     * Undocumented function
     *
     * @return void
     */

    public function testCreateUser()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('client.create'));

        $response->assertStatus(302);
    }

    public function testAllUser()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('user.all'));

        $response->assertStatus(200);

    }

  
    
}