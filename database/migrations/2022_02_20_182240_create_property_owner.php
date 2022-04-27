<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();

            $table->unsignedBigInteger('office_account_id');
            $table->foreign('office_account_id')->references('id')->on('office_account')->onDelete('cascade');
            
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
        Schema::dropIfExists('property_owner');
    }
}
