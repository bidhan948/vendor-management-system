<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoOfDamageToTransctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transctions', function (Blueprint $table) {
            $table->unsignedInteger('no_of_damage')->nullable();
            $table->unsignedInteger('no_of_lost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transctions', function (Blueprint $table) {
            //
        });
    }
}
