<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Clinic\ListClinicPage;
use App\Clinic;
use App\ClinicType;
use App\ClinicImage;

class DeleteClinicTest extends AdminDuskTestCase
{
    use DatabaseMigrations;
    
    public const NUMBER_CLINIC_TYPE_CREATE = 5;
    public const NUMBER_CLINIC_CREATE = 5;

    public function setUp()
    {
        parent::setUp();
        factory(ClinicType::class, self::NUMBER_CLINIC_TYPE_CREATE)->create();
        factory(Clinic::class, self::NUMBER_CLINIC_CREATE)->create()->each(function ($clinic) {
            $clinic->images()->save(factory(ClinicImage::class)->make());
        });
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
                ->assertSee( __('admin/clinic.delete.success') );
        });
    }
}
