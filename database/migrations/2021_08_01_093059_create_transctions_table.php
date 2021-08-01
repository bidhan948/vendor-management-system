<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transctions', function (Blueprint $table) {
            $table->id();
            $table->integer('no_of_in_product')->nullable();
            $table->integer('no_of_out_product')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('product_id')->nullable()->constrained();
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
        Schema::dropIfExists('transctions');
    }
}
