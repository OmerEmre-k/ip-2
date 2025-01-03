<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('education_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('education_field_id')->nullable();
            $table->timestamps();

            $table->foreign('education_field_id')->references('id')->on('education_fields')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('education_fields');
    }
};
