<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('strain');
            $table->string('strainType');
            $table->string('seedOrigin');
            $table->string('stage');
            $table->string('IO')->nullable();
            $table->date('startDate');
            $table->date('harvestDate')->nullable();
            $table->integer('yield')->nullable();
            $table->string('description')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('plants');
    }
}
