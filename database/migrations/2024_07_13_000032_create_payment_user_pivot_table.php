<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_user', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_9924321')->references('id')->on('payments')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9924321')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
