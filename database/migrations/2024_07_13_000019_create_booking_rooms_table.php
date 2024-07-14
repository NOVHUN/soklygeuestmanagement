<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('booking_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('check_in_date');
            $table->datetime('check_out_date');
            $table->datetime('actual_check_in_date')->nullable();
            $table->datetime('actual_check_out_date')->nullable();
            $table->decimal('price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
