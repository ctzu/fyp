<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'club_id',
        'name',
        'place',
        'date',
        'activity_level_id',
        'activity_achievement_id',
        'activity_committee_id',
        'activity_status_id',
        'created_by'
    ];

    /**
     * Get the club.
     */
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    /**
     * Get the level.
     */
    public function level()
    {
        return $this->belongsTo(ActivityLevel::class, 'activity_level_id');
    }

    /**
     * Get the achievement
     */
    public function achievement()
    {
        return $this->belongsTo(ActivityAchievement::class, 'activity_achievement_id');
    }

    /**
     * Get the committee.
     */
    public function committee()
    {
        return $this->belongsTo(ActivityCommittee::class, 'activity_committee_id');
    }

    /**
     * Get the status.
     */
    public function status()
    {
        return $this->belongsTo(ActivityStatus::class, 'activity_status_id');
    }

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the files.
     */
    public function files()
    {
        return $this->hasMany(File::class, 'activity_id');
    }
}
