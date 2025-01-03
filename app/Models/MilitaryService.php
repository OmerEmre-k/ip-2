<?php

// app/Models/MilitaryService.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryService extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'military_status', 'military_service_start_date', 'military_service_end_date'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
