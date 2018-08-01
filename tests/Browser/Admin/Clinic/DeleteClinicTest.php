<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Clinic\ListClinicPage;
use App\Admin;
use App\Clinic;
use App\ClinicType;
use App\ClinicImage;

class DeleteClinicTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $admin;
    
    public function setUp()
    {
        parent::setUp();
        factory(ClinicType::class, 5)->create();
        factory(Clinic::class, 5)->create()->each(function ($clinic) {
            $clinic->images()->save(factory(ClinicImage::class)->make());
        });
        $this->admin = factory(Admin::class)->create();
    }

    /**
     * test delete a clinic
     *
     * @return void
     */
    public function test_it_can_delete_a_clinic()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new ListClinicPage)
                    ->press('@deleteButton')
                    ->acceptDialog()
                    ->assertSee( __('admin/clinic.delete.success'));
        });
    }
}
