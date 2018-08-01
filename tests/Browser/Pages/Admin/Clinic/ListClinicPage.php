<?php

namespace Tests\Browser\Pages\Admin\Clinic;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ListClinicPage extends BasePage
{
    public const PER_PAGE = 15;
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinics';
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
            ->assertSee('List clinics')
            ->assertSee('Clinic Type')
            ->assertSee('Name')
            ->assertSee('Address')
            ->assertSee('Phone');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@deleteButton' => 'tbody tr:first-child td form button.btn-outline-danger',
        ];
    }
}
