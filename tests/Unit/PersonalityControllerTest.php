<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class PersonalityControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexPersonality(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('personality.index'));

        $response->assertStatus(200);

    }
}

