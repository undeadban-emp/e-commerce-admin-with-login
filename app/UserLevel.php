<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $primaryKey = 'user_level_id';
    protected $fillable = [
        'user_level_name',
    ];
}
