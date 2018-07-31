<?php

namespace Tests\Browser\Admin\ClinicType;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\ClinicType\ListClinicType;

class ListClinicTypeTest extends AdminDuskTestCase
{
    use DatabaseMigrations;

    const NUM_RECORD = 20;

    /**
     * Test list clinic types with NUM_RECORD record.
     *
     * @return void
     */
    public function test_it_can_show_all_clinic_types()
    {
        factory(\App\ClinicType::class, self::NUM_RECORD)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType);
            $this->assertEquals(self::NUM_RECORD, count($browser->elements('@clinicTypes')));
        });
    }

    /**
     * Test it can show clinic types with empty
     *
     * @return void
     */
    public function test_it_can_show_clinic_types_with_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType);
            $this->assertEquals(0, count($browser->elements('@clinicTypes')));
        });
    }
}
