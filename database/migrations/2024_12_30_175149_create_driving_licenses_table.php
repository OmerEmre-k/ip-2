<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingLicensesTable extends Migration
{
    public function up()
    {
        Schema::create('driving_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('license_class');
            $table->timestamps();
        });


    }

    public function down()
    {
        Schema::dropIfExists('driving_licenses');
    }
}

