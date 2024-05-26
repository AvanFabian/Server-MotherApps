<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_type',
        'calories_burned_prediction',
    ];

    public function activityRecord()
    {
        return $this->belongsTo(ActivityRecord::class);
    }
}