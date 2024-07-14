<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_number');
            $table->string('customer_name');
            $table->decimal('total_price', 15, 2)->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}