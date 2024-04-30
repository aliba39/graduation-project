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
            $table->String('title');
            $table->integer('prix_12');
            $table->integer('prix_13');
            $table->integer('prix_14');
            $table->String('hotel_1');
            $table->String('hotel_2');
            $table->String('discription');
            $table->String('image');
            $table->String('stay_makh');
            $table->String('stay_madina');
            $table->String('date_in');
            $table->String('date_out');
            $table->String('airport_1');
            $table->String('airport_2');
            $table->timestamps();
            
        });
    }
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
