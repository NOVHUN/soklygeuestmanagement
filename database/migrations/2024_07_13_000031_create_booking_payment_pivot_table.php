<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingPaymentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_payment', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_9924314')->references('id')->on('payments')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_9924314')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
}
