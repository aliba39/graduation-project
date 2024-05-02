<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); 
            $table->integer('prix_12')->nullable();
            $table->integer('prix_13')->nullable();
            $table->integer('prix_14')->nullable();
            $table->string('hotel_1', 255)->nullable();
            $table->string('hotel_2', 255)->nullable(); 
            $table->string('discription', 1024); 
            $table->string('image', 255)->nullable(); 
            $table->string('stay_makh', 255);
            $table->string('stay_madina', 255);
            $table->date('date_in'); 
            $table->date('date_out');
            $table->string('airport_1', 255);
            $table->string('airport_2', 255)->nullable(); 
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
