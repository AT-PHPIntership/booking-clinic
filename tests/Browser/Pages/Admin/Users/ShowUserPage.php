<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use App\User;

class ShowUserPage extends BasePage
{

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/' . $this->user->id;
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
            ->assertSee('User id ' . $this->user->id)
            ->assertSee('Name')
            ->assertSee('Email')
            ->assertSee('Gender')
            ->assertSee('Day of Birth')
            ->assertSee('Phone Number')
            ->assertSee('Address')
            ->assertSee('Created At')
            ->assertValue('@email', $this->user->email)
            ->assertValue('@name', $this->user->name)
            ->assertValue('@gender', $this->user->gender_string)
            ->assertValue('@dob', $this->user->dob)
            ->assertValue('@phone', $this->user->phone)
            ->assertValue('@address', $this->user->address)
            ->assertValue('@createdAt', $this->user->created_at);
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name="email"]',
            '@name' => 'input[name="name"]',
            '@gender' => 'input[name="gender"]',
            '@dob' => 'input[name="dob"]',
            '@phone' => 'input[name="phone"]',
            '@address' => 'input[name="address"]',
            '@createdAt' => 'input[name="created-at"]',
        ];
    }
}
