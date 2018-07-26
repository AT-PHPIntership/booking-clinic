<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\ListClinicType;

class ListClinicTypeTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_can_list_clinic_types()
    {
        $admin = factory(\App\Admin::class)->create();
        dd($admin);
        $this->browse(function (Browser $browser) use ($admin){
            $browser->loginAs($admin, 'web-admin')
                ->visit(new ListClinicType);
        });
    }
}
