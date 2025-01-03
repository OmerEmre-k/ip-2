<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationField extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function applications()
    {
        return $this->hasMany(Application::class, 'education_field_id');
    }


    public static function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:education_fields,name',
        ];
    }
}
