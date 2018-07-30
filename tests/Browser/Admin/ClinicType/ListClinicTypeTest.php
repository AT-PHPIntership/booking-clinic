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
    public function test_list_clinic_types_with_num_records()
    {
        factory(\App\ClinicType::class, self::NUM_RECORD)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType);
        $this->assertEquals(self::NUM_RECORD, count($browser->elements('@clinicTypes')));
        });
    }

    /**
     * Test list clinic types with 0 record.
     *
     * @return void
     */
    public function test_list_clinic_types_with_no_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType);
        $this->assertEquals(0, count($browser->elements('@clinicTypes')));
        });
    }
}
