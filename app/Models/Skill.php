<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function applications()
    {
        return $this->belongsToMany(Application::class, 'job_application_skill');
    }


    public static function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:skills,name',
        ];
    }
}
