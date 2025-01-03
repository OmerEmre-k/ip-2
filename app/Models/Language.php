<?php

// app/Models/Language.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'language', 'proficiency_level'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

