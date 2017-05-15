<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'matric_no',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Check role of the user.
     *
     * @return boolean
     */
    public function hasRole($role = null)
    {
        if (is_null($role)) {
            throw new Exception('Role not found.');
        }

        if ($this->role === $role) {
            return true;
        }

        return false;
    }

    /**
     * Get the lecturer associated with the user.
     */
    public function lecturer()
    {
        return $this->hasOne(Lecturer::class, 'user_id');
    }

    /**
     * Get the administrator associated with the user.
     */
    public function administrator()
    {
        return $this->hasOne(Administrator::class, 'user_id');
    }

    /**
     * Get the student associated with the user.
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    /**
     * Get the student associated with the user.
     */
    public function club()
    {
        return $this->hasOne(Club::class, 'name');
    }


    /**
     * Get the a activities associated with the user.
     */
    public function activities()
    {
        return $this->hasOne(Activity::class, 'created_by');
    }

    /**
     * Get the a announcements associated with the user.
     */
    public function announcements()
    {
        return $this->hasOne(Announcement::class, 'created_by');
    }

    /**
     * Get markah.
     */
    public function markahMerit()
    {
        return $this->hasOne(MarkahMerit::class, 'user_id');
    }

}
