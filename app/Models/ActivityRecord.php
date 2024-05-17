<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_id',
        'duration',
        'distance',
        'heart_rate',
        'humidity',
        'rehydration_time',
        'last_menstrual_period',
        'complaints',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sportsActivity()
    {
        return $this->belongsTo(SportsActivity::class, 'activity_id');
    }
    public function activityRoute()
    {
        return $this->hasOne(ActivityRoute::class);
    }
}
