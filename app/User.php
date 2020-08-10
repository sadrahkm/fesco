<?php

namespace App;

use App\Models\Order;
use App\Models\Reserve;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [
        'id',
        'role',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    const UPDATED_AT = null;
    const ADMIN = 1;
    const USER = 0;

    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = bcrypt($value);
    }

/*    public function getRoleAttribute($value)
    {
        if($value == self::ADMIN){
            return "<span style='color: red'>ادمین</span>";
        }
        return "<span>کاربر عادی</span>";
    }*/

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class,'user_id');
    }
}
