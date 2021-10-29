<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primarykey = 'status_id';
    protected $fillable = ['status_name'];
}
