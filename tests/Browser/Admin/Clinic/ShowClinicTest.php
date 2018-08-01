<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AdminDuskTestCase;
use Tests\Browser\Pages\Admin\Clinic\ShowClinicPage;
use App\ClinicType;
use App\Clinic;

class ShowClinicTest extends AdminDuskTestCase
{
    use DatabaseMigrations;

    public const NUMBER_CLINIC_TYPE_CREATE = 5;
    public const NUMBER_CLINIC_CREATE = 20;

    /**
     * A Dusk test it can show detail clinic
     *
     * @return void
     */
    public function test_it_can_show_detail_with_existed_clinic()
    {
        factory(ClinicType::class, self::NUMBER_CLINIC_TYPE_CREATE)->create();
        factory(Clinic::class, self::NUMBER_CLINIC_CREATE)->create();
        $clinic = Clinic::all()->random();

        $this->browse(function (Browser $browser) use ($clinic) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new ShowClinicPage($clinic->id))
                ->assertValue('input[name="clinic_type"]', $clinic->clinicType->name)
                ->assertValue('input[name="name"]', $clinic->name)
                ->assertValue('input[name="phone"]', $clinic->phone)
                ->assertValue('input[name="address"]', $clinic->address)
                ->assertValue('input[name="created_at"]', $clinic->created_at->toFormattedDateString())
                ->assertSee($clinic->email)
                ->assertSee($clinic->description);
        });
    }

    /**
     * A Dusk test it can not show with non existed clinic
     *
     * @return void
     */
    public function test_it_can_not_show_with_non_existed_clinic()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit('/admin/clinic/999')
                ->assertDontSee('Clinic id 999')
                ->assertDontSee('Clinic Type')
                ->assertDontSee('Name')
                ->assertDontSee('Address')
                ->assertDontSee('Phone')
                ->assertDontSee('Description')
                ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
