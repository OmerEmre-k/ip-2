<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'education',
        'resume',
        'notes',
        'cv_path',
        'education_level_id',
        'education_field_id',
        'skill_id',
        'location_id',
        'military_status_id',
        'driving_license_id',
        'marital_status_id',
        'language_id',
    ];

    protected $casts = [
        'skills_name' => 'array',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function educationField()
    {
        return $this->belongsTo(EducationField::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function militaryService()
    {
        return $this->belongsTo(MilitaryService::class);
    }

    public function drivingLicense()
    {
        return $this->belongsTo(DrivingLicense::class);
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function getCvPathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
