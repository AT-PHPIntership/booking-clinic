<?php

namespace Tests\Browser\Pages\Admin\Clinic;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class UpdateClinicPage extends BasePage
{
    protected $clinic;

    public function __construct(\App\Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinics/' . $this->clinic->id . '/edit';
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
                ->assertSee('Update a clinic')
                ->assertSee('Clinic Type')
                ->assertSee('Name')
                ->assertSee('Phone')
                ->assertSee('Email');
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
