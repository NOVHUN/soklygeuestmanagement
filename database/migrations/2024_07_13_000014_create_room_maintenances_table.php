<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMaintenancesTable extends Migration
{
    public function up()
    {
        Schema::create('room_maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
