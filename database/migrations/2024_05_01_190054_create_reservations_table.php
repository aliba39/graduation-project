<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('family_name');
            $table->string('phone_number', 15)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->Integer('number_people');
            $table->string('birth_certificate')->nullable();
            $table->string('passport')->nullable(); 
            $table->string('offer_type')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('offer_id')->nullable(); 
            $table->foreign('offer_id')->references('id')->on('offers'); 
        });
    }

    
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['offer_id']); 
            $table->dropColumn('offer_id'); 
        });
    }
}
