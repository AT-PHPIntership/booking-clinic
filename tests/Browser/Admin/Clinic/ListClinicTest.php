<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Clinic\ListClinicPage;
use App\ClinicType;
use App\Clinic;
use App\Admin;

class ListClinicTest extends DuskTestCase
{
    use DatabaseMigrations;

    public const NUMBER_CLINIC_TYPE_CREATE = 5;
    public const NUMBER_CLINIC_CREATE = 20;
    public $admin;

    /**
     * Override function setUp() for seeding
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(ClinicType::class, self::NUMBER_CLINIC_TYPE_CREATE)->create();
        factory(Clinic::class, self::NUMBER_CLINIC_CREATE)->create();
        $admin = factory(Admin::class)->create();
        $this->admin = $admin;
    }
    /**
     * A Dusk test it can show all clinic
     *
     * @return void
     */
    public function test_it_can_show_all_clinic()
    {
        $firstClinic = Clinic::first();
        $lastClinic = Clinic::latest('id')->first();
        $this->browse(function (Browser $browser) use ($firstClinic, $lastClinic) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicPage)
                ->assertQueryStringMissing('page')
                ->assertSee($firstClinic->clinicType->name)
                ->assertSee($firstClinic->name)
                ->assertSee($firstClinic->address)
                ->assertSee($firstClinic->phone);

            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = ListClinicPage::PER_PAGE;
            $this->assertEquals($expectedCount, $actualCount);

            $browser->clickLink('2')
                ->assertQueryStringHas('page', '2')
                ->assertSee($lastClinic->clinicType->name)
                ->assertSee($lastClinic->name)
                ->assertSee($lastClinic->address)
                ->assertSee($lastClinic->phone);

            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = self::NUMBER_CLINIC_CREATE % ListClinicPage::PER_PAGE;
            $this->assertEquals($expectedCount, $actualCount);
        });
    }
}
