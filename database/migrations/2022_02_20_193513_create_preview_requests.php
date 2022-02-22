<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviewRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preview_requests', function (Blueprint $table) {
            $table->id();
            $table->string('message');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
           
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
        Schema::dropIfExists('preview_requests');
    }
}
