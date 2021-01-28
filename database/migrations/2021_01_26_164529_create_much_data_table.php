<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuchDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('much_data', function (Blueprint $table) {
            $table->id();
            $table->integer('item_price');
            $table->integer('salary');
            $table->integer('standard_hours');
            $table->integer('standard_days');
            $table->integer('netflix_fee');
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
        Schema::dropIfExists('much_data');
    }
}
