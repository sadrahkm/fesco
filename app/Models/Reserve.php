<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $guarded = ['id'];
    const UPDATED_AT = null;
    protected $dates = [
        "reserved_at"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
