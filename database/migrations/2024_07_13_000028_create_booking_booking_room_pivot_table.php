<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBookingRoomPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_booking_room', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_room_id');
            $table->foreign('booking_room_id', 'booking_room_id_fk_9934974')->references('id')->on('booking_rooms')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_9934974')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
}
