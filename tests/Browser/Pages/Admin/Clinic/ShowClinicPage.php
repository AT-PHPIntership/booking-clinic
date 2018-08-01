<?php

namespace Tests\Browser\Pages\Admin\Clinic;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ShowClinicPage extends BasePage
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinics/' . $this->id;
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
            ->assertSee('Clinic id ' . $this->id)
            ->assertSee('Clinic Type')
            ->assertSee('Name')
            ->assertSee('Address')
            ->assertSee('Phone')
            ->assertSee('Description')
            ->assertSee('Created at');
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
