<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_account', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->integer('state_account');

            $table->unsignedBigInteger('office_info_id');
            $table->foreign('office_info_id')->references('id')->on('office_info')->onDelete('cascade');
            
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
        Schema::dropIfExists('office_account');
    }
}
