<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('family_name');
            $table->string('phone_number', 10)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->Integer('number_people');
            $table->string('birth_certificate');
            $table->string('passport'); 
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('offer_id'); 
            $table->foreign('offer_id')->references('id')->on('offers'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
