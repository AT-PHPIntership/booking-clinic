<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('gender')->default(0)->change();
            $table->date('dob')->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
            $table->string('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('gender')->default(null)->change();
            $table->date('dob')->nullable(false)->change();
            $table->string('phone', 20)->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
        });
    }
}
