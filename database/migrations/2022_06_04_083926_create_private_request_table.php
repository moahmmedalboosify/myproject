<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_request', function (Blueprint $table) {
            $table->id();


            $table->string('type_request');
            $table->string('area');
            $table->json('extra_features');
            $table->string('message');
            $table->string('message_user')->nullable();
            
            $table->json('address');

            $table->string('state'); //قيد التنفيذ و تم التواصل مع الزبون

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
           
            $table->unsignedBigInteger('office_info_id');
            $table->foreign('office_info_id')->references('id')->on('office_info')->onDelete('cascade');
            
            

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
        Schema::dropIfExists('private_request');
    }
}
