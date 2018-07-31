<?php

namespace Tests\Browser\Admin\ClinicType;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Admin\ClinicType\ListClinicType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\ClinicType;

class DeleteClinicTypeTest extends AdminDuskTestCase
{
    use DatabaseMigrations;

    /**
     * test delete clinic type has clinics
     *
     * @return void
     */
    public function test_it_can_not_delete_clinic_types()
    {
        factory(ClinicType::class)
           ->create()
           ->each(function ($u) {
                $u->clinics()->save(factory(\App\Clinic::class)->make());
            });
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType)
                ->press('@deleteButton')
                ->acceptDialog()
                ->assertSee('Can\'t delete this clinic type now. Some clinics still related to this type.');
        });
    }

    /**
     * test delete clinic type has clinics
     *
     * @return void
     */
    public function test_it_can_delete_clinic_types()
    {
        factory(ClinicType::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicType)
                ->press('@deleteButton')
                ->acceptDialog()
                ->assertSee('Clinic type is deleted');
        });
    }
}
