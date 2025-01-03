<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryServiceTable extends Migration
{
    public function up()
    {
        Schema::create('military_services', function (Blueprint $table) {
            $table->id();
            $table->string('military_status');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('military_service');
    }
}

