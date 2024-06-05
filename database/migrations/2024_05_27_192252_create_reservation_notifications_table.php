<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id'); 
            $table->unsignedBigInteger('user_id'); 
            $table->string('message'); 
            $table->boolean('is_read')->default(false); 
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reservation_notifications');
    }
}
