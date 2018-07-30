<?php

namespace Tests\Browser\Admin\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\ListUserPage;
use App\Admin;
use App\User;

class ListUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public const NUMBER_USER_CREATE = 20;
    public $admin;

    /**
     * Override function setUp() for seeding
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_USER_CREATE)->create();
        $admin = factory(Admin::class)->create();
        $this->admin = $admin;
    }

    /**
     * A Dusk test it can list all users
     *
     * @return void
     */
    public function test_it_can_list_all_user()
    {
        $firstUser = User::first();
        $lastUser = User::latest('id')->first();
        $this->browse(function (Browser $browser) use ($firstUser, $lastUser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListUserPage)
                ->assertQueryStringMissing('page')
                ->assertSee($firstUser->name)
                ->assertSee($firstUser->email)
                ->assertSee($firstUser->gender_string);

            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = ListUserPage::PER_PAGE;
            $this->assertEquals($expectedCount, $actualCount);

            $browser->clickLink('2')
                ->assertQueryStringHas('page', '2')
                ->assertSee($lastUser->name)
                ->assertSee($lastUser->email)
                ->assertSee($lastUser->gender_string);

            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = self::NUMBER_USER_CREATE % ListUserPage::PER_PAGE;
            $this->assertEquals($expectedCount, $actualCount);
        });
    }
}
