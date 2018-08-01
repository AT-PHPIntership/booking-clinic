<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('user_id');
            $table->foreign('clinic_id')
                ->references('id')->on('clinics');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamp('book_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
