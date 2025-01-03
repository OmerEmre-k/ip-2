<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
/**
* Run the migrations.
*/
public function up()
{
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->string('education');
        $table->text('resume');
        $table->text('notes')->nullable();
        $table->string('cv_path');
        $table->foreignId('education_level_id')->constrained('education_levels')->onDelete('cascade');
        $table->foreignId('education_field_id')->constrained('education_fields')->onDelete('cascade');
        $table->timestamps();
        $table->foreignId('skill_id')->nullable()->constrained('skills')->onDelete('cascade');
        $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('cascade');
        $table->foreignId('military_status_id')->nullable()->constrained('military_services')->onDelete('cascade');
        $table->foreignId('driving_license_id')->nullable()->constrained('driving_licenses')->onDelete('cascade');
        $table->foreignId('marital_status_id')->nullable()->constrained('marital_statuses')->onDelete('cascade');
        $table->foreignId('language_id')->nullable()->constrained('languages')->onDelete('cascade');

    });


}

/**
* Reverse the migrations.
*/
public function down()
{
Schema::dropIfExists('applications');
}
};

