<?php

namespace Tests\Browser\Admin\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\ShowUserPage;
use App\User;
use App\Admin;

class ShowUserTest extends DuskTestCase
{

    use DatabaseMigrations;

    public $admin;

    /**
     * Override function setUp() for seeding
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, 20)->create();
        $admin = factory(Admin::class)->create();
        $this->admin = $admin;
    }

    /**
     * A Dusk test it can show detail page with existed user.
     *
     * @return void
     */
    public function test_it_can_show_detail_user_page()
    {
        $user = User::all()->random();
        $this->browse(function (Browser $browser) use ($user){
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new ShowUserPage($user->id))
                    ->assertValue('input[name="email"]', $user->email)
                    ->assertValue('input[name="name"]', $user->name)
                    ->assertValue('input[name="gender"]', $user->gender_string)
                    ->assertValue('input[name="dob"]', $user->dob)
                    ->assertValue('input[name="phone"]', $user->phone)
                    ->assertValue('input[name="address"]', preg_replace('~[\r\n]+~', '', $user->address));
        });
    }

    /**
     * A Dusk test it can not show detail page with non existed user.
     *
     * @return void
     */
    public function test_it_can_not_show_detail_user_page()
    {
        $this->browse(function (Browser $browser){
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit('/admin/users/50')
                    ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
