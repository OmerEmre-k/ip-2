<?php

// app/Models/Location.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'city', 'region'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

