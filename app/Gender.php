<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primarykey = 'gender_id';
    protected $fillable = ['gender_name'];
}
