<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class EventTypeControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexEventType()
    {
        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('eventtype.index'));

        $response->assertStatus(200);
    }

   
    
}