<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalist', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('strDrink', 250)->nullable();
            $table->string('strDrinkThumb', 250)->nullable();
            $table->integer('idDrink')->nullable();
            $table->integer('stars')->nullable();
            $table->string('note', 250)->nullable();
            $table->integer('difficult')->nullable();
            $table->timestamps()->default('current_timestamp()');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalist');
    }
}
