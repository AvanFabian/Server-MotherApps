<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sport_activity_id',
        'duration',
        'distance',
        'calories_prediction',
        'total_calories_burned',
    ];

    protected $appends = ['sport_name', 'sport_movement'];

    public function getSportNameAttribute()
    {
        return optional($this->sportsActivity)->sport_type ?? 'N/A';
    }

    public function getSportMovementAttribute()
    {
        return $this->sportsMovements->pluck('name')->join(', ') ?: 'N/A';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sportsActivity()
    {
        return $this->belongsTo(SportsActivity::class, 'sport_activity_id');
    }
    public function sportsMovements()
    {
        return $this->belongsToMany(SportsMovement::class, 'activity_record_sports_movement');
    }

    public function activityRoute()
    {
        return $this->hasOne(ActivityRoute::class);
    }
}