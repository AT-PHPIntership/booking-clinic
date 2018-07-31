<?php

namespace Tests\Browser\Pages\Admin\ClinicType;
use Laravel\Dusk\Page as BasePage;
use Laravel\Dusk\Browser;

class ListClinicType extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinic-types';
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
            ->assertSee('List')
            ->assertSee('created_at')
            ->assertSee('edit')
            ->assertSee('delete')
            ->assertSee('Add');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@clinicTypes' => 'table > tbody > tr',
            '@deleteButton' => 'table > tbody > tr > td > form > .btn-outline-danger',
        ];
    }
}
