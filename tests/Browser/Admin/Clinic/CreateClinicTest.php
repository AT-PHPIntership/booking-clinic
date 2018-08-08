<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Clinic\CreateClinicPage;
use App\Admin;
use App\ClinicType;
use App\Clinic;

class CreateClinicTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $admin;

    public function setUp()
    {
        parent::setUp();
        factory(ClinicType::class, 5)->create();
        $admin = factory(Admin::class)->create();
        $this->admin = $admin;
    }

    /**
     * A Dusk test it can add new clinic
     *
     * @return void
     */
    public function test_it_can_add_new_clinic()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', 'John Doe')
                    ->type('email', 'johndoe@gmail.com')
                    ->type('phone', '0123456789')
                    ->type('address', '87 Richardson St. New City, NY 10956')
                    ->press('Add')
                    ->assertPathIs('/admin/clinics')
                    ->assertSee('A new clinic is added');
            $this->assertDatabaseHas('clinics', ['name' => 'John Doe']);
        });
    }

    /**
     * A Dusk test it can not add clinic with invalid email
     *
     * @return void
     */
    public function test_it_can_not_add_clinic_with_invalid_email()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', 'John Doe')
                    ->type('email', 'johndoe%gmail.com')
                    ->type('phone', '0123456789')
                    ->type('address', '87 Richardson St. New City, NY 10956')
                    ->press('Add')
                    ->assertSee('The email must be a valid email address');
            $this->assertDatabaseMissing('clinics', ['name' => 'John Doe']);
        });
    }

    /**
     * A Dusk test it can not add clinic with existed email
     *
     * @return void
     */
    public function test_it_can_not_add_clinic_with_existed_email()
    {
        $clinic = factory(Clinic::class)->create(['email' => 'johndoe@gmail.com']);
        $this->browse(function (Browser $browser) use ($clinic) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', 'John Doe')
                    ->type('email', $clinic->email)
                    ->type('phone', '0123456789')
                    ->type('address', '87 Richardson St. New City, NY 10956')
                    ->press('Add')
                    ->assertSee('The email has already been taken');
            $this->assertDatabaseMissing('clinics', ['name' => 'John Doe']);
        });
    }

    /**
     * A Dusk test it can not add clinic with empty data
     *
     * @return void
     */
    public function test_it_can_not_add_clinic_with_empty_data()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', '')
                    ->type('email', '')
                    ->type('phone', '')
                    ->type('address', '')
                    ->press('Add')
                    ->assertSee('The name field is required')
                    ->assertSee('The email field is required')
                    ->assertSee('The phone field is required')
                    ->assertSee('The address field is required');
            $this->assertDatabaseMissing('clinics', ['name' => '']);
        });
    }

    /**
     * A Dusk test it can add new clinic with image
     *
     * @return void
     */
    public function test_it_can_add_new_clinic_with_image()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', 'John Doe')
                    ->type('email', 'johndoe@gmail.com')
                    ->type('phone', '0123456789')
                    ->type('address', '87 Richardson St. New City, NY 10956')
                    ->attach('images[]', __DIR__.'/stuff/avatar.png')
                    ->press('Add')
                    ->assertPathIs('/admin/clinics')
                    ->assertSee('A new clinic is added');
            $this->assertDatabaseHas('clinics', ['name' => 'John Doe']);
            $this->assertEquals(1, Clinic::where('name', 'John Doe')->first()->images()->count());
        });
    }

    /**
     * A Dusk test it can not add clinic with invalid image
     *
     * @return void
     */
    public function test_it_can_not_add_clinic_with_invalid_image()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new CreateClinicPage)
                    ->select('clinic_type_id')
                    ->type('name', 'John Doe')
                    ->type('email', 'johndoe@gmail.com')
                    ->type('phone', '0123456789')
                    ->type('address', '87 Richardson St. New City, NY 10956')
                    ->attach('images[]', __DIR__.'/stuff/doc.txt')
                    ->press('Add')
                    ->assertSee('The images.0 must be an image');
            $this->assertDatabaseMissing('clinics', ['name' => 'John Doe']);
        });
    }
}
