<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('discount_type');
            $table->float('discount_value', 15, 2);
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
