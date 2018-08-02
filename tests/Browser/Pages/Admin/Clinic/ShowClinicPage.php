<?php

namespace Tests\Browser\Pages\Admin\Clinic;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ShowClinicPage extends BasePage
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
        return '/admin/clinics/' . $this->clinic->id;
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
            ->assertSee('Clinic id ' . $this->clinic->id)
            ->assertSee('Clinic Type')
            ->assertSee('Name')
            ->assertSee('Address')
            ->assertSee('Phone')
            ->assertSee('Description')
            ->assertSee('Created at')
            ->assertValue('@clinicType', $this->clinic->clinicType->name)
            ->assertValue('@name', $this->clinic->name)
            ->assertValue('@phone', $this->clinic->phone)
            ->assertValue('@address', $this->clinic->address)
            ->assertValue('@createdAt', $this->clinic->created_at->toFormattedDateString())
            ->assertSee($this->clinic->email)
            ->assertSee($this->clinic->description);
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@clinicType' => 'input[name="clinic-type"]',
            '@name' => 'input[name="name"]',
            '@phone' => 'input[name="phone"]',
            '@address' => 'input[name="address"]',
            '@createdAt' => 'input[name="created-at"]',
        ];
    }
}
