<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkahMerit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'activity_id',
        'markah'
    ];

    /**
     * Get user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get activity
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
