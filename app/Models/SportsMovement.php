<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'sports_activity_id',
        'name',
    ];

    public function activityRecords()
    {
        return $this->belongsToMany(ActivityRecord::class);
    }

    public function sportsActivity()
    {
        return $this->belongsTo(SportsActivity::class);
    }
}