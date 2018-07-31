<?php

namespace Tests\Browser\Admin\Clinic;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Clinic\UpdateClinicPage;
use App\Admin;
use App\Clinic;
use App\ClinicType;

class UpdateClinicTest extends DuskTestCase
{
    use DatabaseMigrations;

    public $admin;
    
    public function setUp()
    {
        parent::setUp();
        factory(ClinicType::class, 5)->create();
        factory(Clinic::class, 20)->create();
        $this->admin = factory(Admin::class)->create();
    }

    /**
     * A Dusk test example it can update clinic
     *
     * @return void
     */
    public function test_it_can_update_clinic()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new UpdateClinicPage(Clinic::find(1)))
                    ->assertSee('Update a clinic')
                    ->select('clinic_type_id')
                    ->type('name', 'johndoe')
                    ->type('email', 'johndoe@gmail.com')
                    ->type('phone', '0123456789')
                    ->press('Update')
                    ->assertPathIs('/admin/clinics')
                    ->assertSee('The clinic has been updated');
            $this->assertDatabaseHas('clinics', ['name' => 'johndoe']);        
        });
        
    }

    /**
     * List test case for invalid input of update clinic
     * 
     * @return void
     */
    public function list_test_case_validate_input_update_clinic()
    {
        return [
            ['email', '', 'The email field is required.'],
            ['email', 'john@gmail.com', 'The email has already been taken.'],
            ['email', 'john#gmail.com', 'The email must be a valid email address.'],
            ['name', '', 'The name field is required.'],
            ['phone', '', 'The phone field is required.'],
            ['phone', '123a#4', 'The phone must be a number.'],
        ];
    }

    /**
     * Test validate input for updating clinic
     *
     * @param string $name
     * @param string $input
     * @param string $message
     * @dataProvider list_test_case_validate_input_update_clinic
     * 
     * @return void
     */
    public function test_it_can_not_update_clinic($name, $input, $message)
    {
        Clinic::find(2)->update(['email' => 'john@gmail.com']);
        $this->browse(function (Browser $browser) use ($name, $input, $message) {
            $browser->loginAs($this->admin, 'web-admin')
                    ->visit(new UpdateClinicPage(Clinic::find(1)))
                    ->assertSee('Update a clinic')
                    ->select('clinic_type_id')
                    ->type($name, $input)
                    ->press('Update')
                    ->assertSee($message);
                    
        });
    }
}
