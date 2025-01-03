<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company',
        'start_date',
        'end_date',
        'description',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function rules()
    {
        return [
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }
}
