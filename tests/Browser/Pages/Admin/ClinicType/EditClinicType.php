<?php

namespace Tests\Browser\Pages\Admin\ClinicType;
use Laravel\Dusk\Page as BasePage;
use Laravel\Dusk\Browser;

class EditClinicType extends BasePage
{
    protected $clinicType;

    public function __construct(\App\ClinicType $clinicType )
    {
        $this->clinicType = $clinicType;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/clinic-types/' . $this->clinicType->getRouteKey() . '/edit';
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
        ->assertSee('Edit clinic type')
        ->assertSee('Name');
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
