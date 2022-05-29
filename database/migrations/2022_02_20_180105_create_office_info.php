<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_info', function (Blueprint $table) {
            $table->id();
            $table->string('name_office');
            $table->string('name_owner');
            $table->string('email');
            $table->string('phone');
            $table->string('description');
            $table->string('state');
            $table->string('point');
            $table->string('lat');
            $table->string('lng');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
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
        Schema::dropIfExists('office_info');
    }
}
