<?php

namespace Tests\Browser\Admin\ClinicType;

use Tests\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\ClinicType\AddClinicType;

class AddClinicTypeTest extends AdminDuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_can_add_clinic_types()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin, 'web-admin')
            ->visit(new AddClinicType)
            ->type('name', 'Đa khoa')
            ->press('Add')
            ->assertSee('List clinic types')
            ->assertSee('A new clinic type is added');
            $this->assertDatabaseHas('clinic_types', ['name' => 'Đa khoa']);
        });
    }

    public function list_test_case_validate_input_add()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['name', 'Đa khoa', 'The name has already been taken.']
        ];
    }

    /**
     * test validate input add clinic type
     * @param string name
     * @param string input
     * @param string message
     * @dataProvider list_test_case_validate_input_add
     * @return void
     */
    public function test_it_can_not_add_clinic_types($name, $input, $message)
    {
        factory(\App\ClinicType::class)->create([
            'name' => 'Đa khoa'
        ]);
        $this->browse(function (Browser $browser) use($name, $input, $message) {
            $browser->loginAs($this->admin, 'web-admin')
                ->visit(new AddClinicType)
                ->type($name, $input)
                ->press('Add')
                ->assertSee($message);
        });
    }
}
