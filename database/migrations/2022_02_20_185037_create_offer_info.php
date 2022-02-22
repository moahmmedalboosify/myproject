<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_info', function (Blueprint $table) {
         
            $table->id();
            $table->string('model_name');
            $table->string('model_id');
            $table->integer('sold');
            $table->integer('number_offer');
            $table->integer('views');
            $table->integer('state'); // sale or rent


            $table->unsignedBigInteger('office_account_id');
            $table->foreign('office_account_id')->references('id')->on('office_account')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('office_info_id');
            $table->foreign('office_info_id')->references('id')->on('office_info')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('property_owner_id');
            $table->foreign('property_owner_id')->references('id')->on('property_owner')->onDelete('cascade');
            
            $table->softDeletes()();
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
        Schema::dropIfExists('offer_info');
    }
}
