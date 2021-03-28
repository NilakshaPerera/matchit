<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SitePagesTest extends DuskTestCase
{

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Visit home page and see if Upcoming Events text is visiblle without loging in. If yes, the page works
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Upcoming Events');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Visit page login and check uf it is visibke without loging in
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login to Account');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Visit register page without registering to see if the page is visible
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Create New Account');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Access reset password page without logging in to see if the page is visible.
     *
     * @return void
     */
    public function testResetPasswordPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/password/reset')
                ->assertSee('Reset Password');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Access the reset password link to see if the page is visible
     *
     * @return void
     */
    public function testResetLinkPasswordPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/password/reset/2f4b4dd1e8830eacc8b59738078a9e828cc2c6f1fed760af970ab92a2f65ee0b?email=perera.nilaksha@gmail.com')
                ->assertSee('Reset Password');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Check if the user can access the /user page without logging in. If not logged in, the user needs to be redirected to Login pgae
     *
     * @return void
     */
    public function testNonLoggedInUserPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user')
                ->assertSee('Login to Account');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Check if the user can access the /user/events without logging in. If not logged in, the user needs to be redirected to Login pgae
     *
     * @return void
     */
    public function testNonLoggedInEvntsPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/events')
                ->assertSee('Login to Account');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Check if the user can access the /user/membership page without logging in. The user needs to be redirected to the login page 
     *
     * @return void
     */
    public function testNonLoggedInMembershipPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/membership')
                ->assertSee('Login to Account');
        });
    }

    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('email', 'perera.nilaksha@gmail.com')
                ->type('name', 'Dale Stokes')
                ->type('phone', "0044" . mt_rand(10000000, 99999999))
                ->type('password', 'Pa$$w0rd!')
                ->type('password_confirmation', 'Pa$$w0rd!')
                ->type('birthday', '09031940')
                ->select('user_type', 'Local')
                ->press('Register')
                ->assertSee('Basic Details');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Log out function needs to redirect user to home page and should be able to see the login option
     *
     * @return void
     */
    public function testLogOut()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/events')
                ->clickLink('Dale Stokes')
                ->clickLink('Logout')
                ->assertSee('Login');
        });
    }


    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Test a valid log in to a client account a valid login should be able to navigate user to /user page
     *
     * @return void
     */
    public function testLoggedInUserPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'perera.nilaksha@gmail.com')
                ->type('password', 'Pa$$w0rd!')
                ->press('Login')
                ->visit('/user')
                ->assertSee('Basic Details');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Check id user is able to navigate to navigate to membership page if logged in
     *
     * @return void
     */
    public function testLoggedInMembershipPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/membership')
                ->assertSee('Ammount Due');
        });
    }

    /**
     * Created At : 27/02/2021
     * Created By : Nilaksha 
     * Summary : Check if the user can navigate to the events page if logged in
     *
     * @return void
     */
    public function testLoggedInEventsPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/events')
                ->assertSee('Your Events');
        });
    }
}
