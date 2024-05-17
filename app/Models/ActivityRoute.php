<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_record_id',
        'latitude',
        'longitude',
    ];

    public function activityRecord()
    {
        return $this->belongsTo(ActivityRecord::class);
    }
}
