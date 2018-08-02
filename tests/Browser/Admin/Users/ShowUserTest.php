<?php

namespace Tests\Browser\Admin\Users;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\ShowUserPage;
use App\User;

class ShowUserTest extends AdminDuskTestCase
{

    use DatabaseMigrations;

    private const NUMBER_USER_CREATE = 20;

    /**
     * Override function setUp() for seeding
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_USER_CREATE)->create();
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
                ->visit(new ShowUserPage($user));
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
