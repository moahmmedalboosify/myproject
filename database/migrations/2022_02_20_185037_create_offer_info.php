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
            $table->string('number_offer');
            $table->integer('views');
            $table->string('state'); // sale or rent
            $table->integer('state_offer'); // active or not

        
            $table->unsignedBigInteger('office_account_id');
            $table->foreign('office_account_id')->references('id')->on('office_account')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('office_info_id');
            $table->foreign('office_info_id')->references('id')->on('office_info')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
            
            
            
            $table->unsignedBigInteger('office_client_id');
            $table->foreign('office_client_id')->references('id')->on('office_client')->onDelete('cascade');
            
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
        Schema::dropIfExists('offer_info');
    }
}
