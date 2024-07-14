<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRoomRoomPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_room_room', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_room_id');
            $table->foreign('booking_room_id', 'booking_room_id_fk_9924290')->references('id')->on('booking_rooms')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_id_fk_9924290')->references('id')->on('rooms')->onDelete('cascade');
        });
    }
}
