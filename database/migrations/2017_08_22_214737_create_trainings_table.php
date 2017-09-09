<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('duration');
            $table->string('price');
            $table->string('background');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });  

        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });     

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->timestamps();
        });     

        Schema::table('trainings', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('article_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('levels');
        Schema::dropIfExists('articles');
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign('trainings_category_id_foreign');
            $table->dropForeign('trainings_level_id_foreign');
            $table->dropForeign('trainings_article_id_foreign');
        });

    }
}
