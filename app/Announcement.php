<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'club_id',
        'description',
        'placeP',
        'dateP',
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
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
