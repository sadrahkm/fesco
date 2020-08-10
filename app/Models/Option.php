<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $primaryKey = 'name';
}
