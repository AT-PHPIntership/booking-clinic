<?php

namespace Tests\Browser\Pages\Admin\Clinic;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class CreateClinicPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinics/create';
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
            ->assertTitleContains('Clinic')
            ->assertSee('Add new clinic')
            ->assertSee('Name')
            ->assertSee('Email')
            ->assertSee('Address')
            ->assertSee('Phone')
            ->assertSee('Clinic type');
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
