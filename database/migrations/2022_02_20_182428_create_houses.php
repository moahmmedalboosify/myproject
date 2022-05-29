<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->string('description');
            $table->string('document_type');
            $table->string('area');
            $table->string('area_land');
            $table->string('rooms');
            $table->string('bathrooms');
            $table->string('floor');
            $table->string('age');
            $table->string('furnished');
            $table->json('extra_features');
            $table->string('point');
            $table->string('lat');
            $table->string('lng');
            $table->string('price');
            $table->json('pyment_method');


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
        Schema::dropIfExists('houses');
    }
}
