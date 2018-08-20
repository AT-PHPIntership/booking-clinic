<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ListUserPage extends BasePage
{
    public const PER_PAGE = 15;

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users';
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
            ->assertSee('List users')
            ->assertSee('Name')
            ->assertSee('Email')
            ->assertSee('Gender');
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
