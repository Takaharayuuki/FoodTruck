<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_login_successfully()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/login')->assertSee('ログイン')->screenshot('login')->type('email', 'customer@example.com')->type('password', 'password')->screenshot('login2')
                ->clickAtXPath('//*[@id="app"]/div/div[2]/div/form/div[3]/button')
                ->screenshot('login3');
        });
    }
}
