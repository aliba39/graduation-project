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
            $table->unsignedBigInteger('reservation_id'); // ربط الإشعار بالحجز
            $table->unsignedBigInteger('user_id'); // ربط الإشعار بالمستخدم (مثل admin)
            $table->string('message'); // رسالة الإشعار
            $table->boolean('is_read')->default(false); // علامة لقراءة الإشعار
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reservation_notifications');
    }
}
