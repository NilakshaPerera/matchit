<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class EventControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexEvent(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('events.index'));

        $response->assertStatus(200);

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testShowEvent(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('events.show'));

        $response->assertStatus(200);

    }


    

}
