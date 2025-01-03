<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'organization',
        'issued_date',
        'expiry_date',
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
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date|after_or_equal:issued_date',
            'description' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
        ];
    }


    public function setIssuedDateAttribute($value)
    {
        $this->attributes['issued_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function setExpiryDateAttribute($value)
    {
        if ($value) {
            $this->attributes['expiry_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
        }
    }
}
