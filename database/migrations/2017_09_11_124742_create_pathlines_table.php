<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathlines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::table('pathlines', function (Blueprint $table) {
            $table->integer('training_id')->unsigned();
            $table->integer('carrier_id')->unsigned();

            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('pathlines', function (Blueprint $table) {
            $table->dropForeign('pathlines_training_id_foreign');
            $table->dropForeign('pathlines_carrier_id_foreign');
        });
        Schema::dropIfExists('pathlines');
    }
}
