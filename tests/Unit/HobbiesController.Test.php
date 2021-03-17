<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class HobbiesControllerTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIndexHobbies(){

        $user = factory(User::class)->create(getNewSeniorClientServiceAgent());

        $response = $this->actingAs($user)
                         ->get(route('hobby.index'));

        $response->assertStatus(200);

    }
}