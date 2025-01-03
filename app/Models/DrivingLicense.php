<?php

// app/Models/DrivingLicense.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingLicense extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'license_type', 'license_issued_date'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

