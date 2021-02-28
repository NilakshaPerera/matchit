<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class SiteProfileFunctionsTest extends DuskTestCase
{

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Register a user with valid data testing
     *
     * @return void
     */
    public function testRegister()
    {
        $faker = Faker::create();
        $this->browse(function (Browser $browser) use($faker) {
            $browser->visit('/register')
                ->type('name', $faker->name)
                ->type('phone', "0044".mt_rand( 10000000, 99999999))
                ->type('email', $faker->email)
                ->type('password', 'Pa$$w0rd!')
                ->type('password_confirmation', 'Pa$$w0rd!')
                ->type('birthday', '09/03/1940')
                ->select('user_type', 'Out of Region')
                ->press('Register')
                ->assertSee('Basic Details');
        });
    }
    
}
