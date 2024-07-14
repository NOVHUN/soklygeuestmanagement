<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomRoomMaintenancePivotTable extends Migration
{
    public function up()
    {
        Schema::create('room_room_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('room_maintenance_id');
            $table->foreign('room_maintenance_id', 'room_maintenance_id_fk_9924240')->references('id')->on('room_maintenances')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_id_fk_9924240')->references('id')->on('rooms')->onDelete('cascade');
        });
    }
}
