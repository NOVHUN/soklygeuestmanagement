<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBookingServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_booking_service', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_service_id');
            $table->foreign('booking_service_id', 'booking_service_id_fk_9924301')->references('id')->on('booking_services')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_9924301')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
}
