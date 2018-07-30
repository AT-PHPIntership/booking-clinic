<?php

namespace Tests\Browser\Admin\ClinicType;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\ClinicType\EditClinicType;

class EditClinicTypeTest extends AdminDuskTestCase
{
    use DatabaseMigrations;
    public function setUp()
    {
        parent::setUp();
        factory(\App\ClinicType::class)->create([
            'name' => 'Đa khoa'
        ]);
        factory(\App\ClinicType::class)->create([
            'name' => 'Nội khoa'
        ]);
    }

     /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_edit_clinic_type()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin,'web-admin')
            ->visit(new EditClinicType(\App\ClinicType::find(1)))
            ->type('name', 'Ngoại Khoa')
            ->press('Update')
            ->assertSee('List clinic types')
            ->assertSee('Clinic type is updated');
        });
    }

     /**
     * list test case validate input edit clinic type
     * @param
     * @return array
     */
    public function list_test_case_validate_input_edit_clinic_type()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['name', 'Đa khoa', 'The name has already been taken.']
        ];
    }

     /**
     * @param string name
     * @param string input
     * @param string message
     * @dataProvider list_test_case_validate_input_edit_clinic_type
     */
    public function test_validate_input_edit_clinic_type($name, $input, $message)
    {
        $this->browse(function (Browser $browser) use($name, $input, $message) {
            $browser->loginAs($this->admin, 'web-admin')
            ->visit(new EditClinicType(\App\ClinicType::find(2)))
            ->type($name, $input)
            ->press('Update')
            ->assertSee($message);
        });
    }
}
