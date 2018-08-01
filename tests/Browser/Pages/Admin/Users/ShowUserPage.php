<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use App\User;

class ShowUserPage extends BasePage
{

    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/' . $this->userId;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertTitleContains(__('admin/user.show.title'))
                ->assertSee('User id ' . $this->userId)
                ->assertSee('name')
                ->assertSee('email')
                ->assertSee('gender')
                ->assertSee('day of birth')
                ->assertSee('phone number')
                ->assertSee('address');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
