<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMPUser extends Model
{
    /**
     *
     */
    protected $connection = 'smp_mysql';

    /**
     *
     */
    protected $table = 'smp_users';
}
