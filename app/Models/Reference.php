<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'relationship',
        'phone',
        'email',
        'job_id',
    ];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }


    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'job_id' => 'nullable|exists:jobs,id',
        ];
    }
}
