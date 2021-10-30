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

            $user = User::factory()->create([
                'email' => 'customer@example.com',
                'name' => 'testtest',
                'password' => 'password',
                'userType' => 'customer'
            ]);

            $browser->visit('/login')
                ->waitFor('.vld-parent')
                ->type('email', $user->email)
                ->type('password', $user->password);
        });
    }
}
