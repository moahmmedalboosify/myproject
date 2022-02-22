<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
           
            $table->string('area');
     
            $table->string('extra_features');
            $table->string('images');
            $table->string('location_lat');
            $table->string('location_lng');
            $table->string('price');
            $table->string('pyment_method');


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
        Schema::dropIfExists('commercial');
    }
}
