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
    
    private const NUMBER_CLINIC_TYPE_CREATE = 5;
    private const NUMBER_CLINIC_CREATE = 5;

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
                ->press('@deleteButtonFirstClinic')
                ->assertDialogOpened('Are you sure?')
                ->acceptDialog()
                ->assertSee('The clinic has been deleted');
            $this->assertSoftDeleted('clinics', ['id' => '1']);    
        });
    }

    /**
     * test can't delete a clinic without pressing confirm dialog prompt
     *
     * @return void
     */
    public function test_it_can_not_delete_a_clinic_with_cancel_dialog_confirm()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicPage)
                ->press('@deleteButtonFirstClinic')
                ->assertDialogOpened('Are you sure?')
                ->dismissDialog();
            $this->assertDatabaseHas('clinics', ['id' => '1', 'deleted_at' => null]);     
        });
    }

    /**
     * test can't delete a clinic already deleted.
     *
     * @return void
     */
    public function test_it_can_not_delete_a_clinic_already_deleted()
    {
        $clinic = Clinic::find(1);
        $this->browse(function (Browser $browser) use ($clinic) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ListClinicPage);
            $clinic->delete();
            $browser->press('@deleteButtonFirstClinic')
                ->assertDialogOpened('Are you sure?')
                ->acceptDialog()
                ->assertSee('Sorry, the page you are looking for could not be found.');
            $this->assertSoftDeleted('clinics', ['id' => '1']);     
        });
    }
}
