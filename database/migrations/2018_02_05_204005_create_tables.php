<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso2');
            $table->string('shortName');
            $table->string('longName');
            $table->string('iso3');
            $table->string('numCode');
            $table->timestamps();
        });
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('market');
            $table->timestamps();
        });
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('desks');
            $table->integer('Sf');
            $table->text('address1');
            $table->text('address2');
            $table->string('city');
            $table->string('state');
            $table->string('postalCode');
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedInteger('countryId');
            $table->foreign('countryId')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('regionalCategory');
            $table->unsignedInteger('marketId');
            $table->foreign('marketId')
                ->references('id')
                ->on('markets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('submarketId');
            $table->integer('locationId');
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
        Schema::dropIfExists('properties');
        Schema::dropIfExists('markets');
        Schema::dropIfExists('countries');
    }
}
