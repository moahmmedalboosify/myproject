<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('document_type');
            $table->string('area');
            $table->string('extra_features');
            $table->string('images');
            $table->string('location_lat');
            $table->string('location_lng');
            $table->string('price');
            $table->string('pyment_method');


            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land');
    }
}
