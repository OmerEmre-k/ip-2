<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];


    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }


    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }


    public function applicationsCount()
    {
        return $this->applications()->count();
    }
}
