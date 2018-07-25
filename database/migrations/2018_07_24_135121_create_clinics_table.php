<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->decimal('lat', 8, 6)->nullable();
            $table->decimal('lng', 9, 6)->nullable();
            $table->unsignedInteger('clinic_type_id');
            $table->foreign('clinic_type_id')
                ->references('id')->on('clinic_types');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
