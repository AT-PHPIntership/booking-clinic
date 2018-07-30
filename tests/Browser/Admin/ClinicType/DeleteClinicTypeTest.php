<?php

namespace Tests\Browser\Admin\ClinicType;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Admin\ClinicType\ListClinicType;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteClinicTypeTest extends AdminDuskTestCase
{
    use DatabaseMigrations;

    /**
     * test delete clinic type has clinics
     *
     * @return void
     */
    public function test_delete_clinic_type_has_clinics()
    {
        factory(\App\ClinicType::class)
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
    public function test_delete_clinic_type_has_not_clinics()
    {
        factory(\App\ClinicType::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
            ->visit(new ListClinicType)
            ->press('@deleteButton')
            ->acceptDialog()
            ->assertSee('Clinic type is deleted');
        });
    }
}
