<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EducationFieldController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\SkillController;
use App\Models\Job;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DrivingLicenseController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\MilitaryStatusController;
use App\Http\Controllers\LocationController;


Route::get('/', function () {
    $jobs = Job::all();
    return view('home', ['jobs' => $jobs]);
})->name('home');

Route::get('/job/{id}', function ($id) {

    $job = Job::find($id);
    if (!$job) {
        abort(404, 'İş ilanı bulunamadı.');
    }
    return view('job', ['job' => $job]);
})->name('job.detail');



Route::get('/apply/{id}', [ApplicationController::class, 'index'])->name('job.apply');
Route::post('/apply/{id}', [ApplicationController::class, 'store'])->name('application.store');

Route::get('/education-fields', [EducationFieldController::class, 'index'])->name('educationFields.index');
Route::get('/education-fields/create', [EducationFieldController::class, 'create'])->name('educationFields.create');
Route::post('/education-fields', [EducationFieldController::class, 'store'])->name('educationFields.store');
Route::get('/education-fields/{id}/edit', [EducationFieldController::class, 'edit'])->name('educationFields.edit');
Route::put('/education-fields/{id}', [EducationFieldController::class, 'update'])->name('educationFields.update');
Route::delete('/education-fields/{id}', [EducationFieldController::class, 'destroy'])->name('educationFields.destroy');

Route::get('/education-levels', [EducationLevelController::class, 'index'])->name('educationLevels.index');
Route::get('/education-levels/create', [EducationLevelController::class, 'create'])->name('educationLevels.create');
Route::post('/education-levels', [EducationLevelController::class, 'store'])->name('educationLevels.store');
Route::get('/education-levels/{id}/edit', [EducationLevelController::class, 'edit'])->name('educationLevels.edit');
Route::put('/education-levels/{id}', [EducationLevelController::class, 'update'])->name('educationLevels.update');
Route::delete('/education-levels/{id}', [EducationLevelController::class, 'destroy'])->name('educationLevels.destroy');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
Route::get('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
Route::put('/languages/{id}', [LanguageController::class, 'update'])->name('languages.update');
Route::delete('/languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');

Route::get('/driving-licenses', [DrivingLicenseController::class, 'index'])->name('drivingLicenses.index');
Route::get('/driving-licenses/create', [DrivingLicenseController::class, 'create'])->name('drivingLicenses.create');
Route::post('/driving-licenses', [DrivingLicenseController::class, 'store'])->name('drivingLicenses.store');
Route::get('/driving-licenses/{id}/edit', [DrivingLicenseController::class, 'edit'])->name('drivingLicenses.edit');
Route::put('/driving-licenses/{id}', [DrivingLicenseController::class, 'update'])->name('drivingLicenses.update');
Route::delete('/driving-licenses/{id}', [DrivingLicenseController::class, 'destroy'])->name('drivingLicenses.destroy');

Route::get('/marital-statuses', [MaritalStatusController::class, 'index'])->name('maritalStatuses.index');
Route::get('/marital-statuses/create', [MaritalStatusController::class, 'create'])->name('maritalStatuses.create');
Route::post('/marital-statuses', [MaritalStatusController::class, 'store'])->name('maritalStatuses.store');
Route::get('/marital-statuses/{id}/edit', [MaritalStatusController::class, 'edit'])->name('maritalStatuses.edit');
Route::put('/marital-statuses/{id}', [MaritalStatusController::class, 'update'])->name('maritalStatuses.update');
Route::delete('/marital-statuses/{id}', [MaritalStatusController::class, 'destroy'])->name('maritalStatuses.destroy');

Route::get('/military-statuses', [MilitaryStatusController::class, 'index'])->name('militaryStatuses.index');
Route::get('/military-statuses/create', [MilitaryStatusController::class, 'create'])->name('militaryStatuses.create');
Route::post('/military-statuses', [MilitaryStatusController::class, 'store'])->name('militaryStatuses.store');
Route::get('/military-statuses/{id}/edit', [MilitaryStatusController::class, 'edit'])->name('militaryStatuses.edit');
Route::put('/military-statuses/{id}', [MilitaryStatusController::class, 'update'])->name('militaryStatuses.update');
Route::delete('/military-statuses/{id}', [MilitaryStatusController::class, 'destroy'])->name('militaryStatuses.destroy');

Route::get('/locations', [LocationController::class, 'index'])->name('location.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('location.create');
Route::post('/locations', [LocationController::class, 'store'])->name('location.store');
Route::get('/locations/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('/locations/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('location.destroy');
