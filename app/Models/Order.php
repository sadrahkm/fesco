<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDERED = 0;
    const INPROCESS = 1;
    const DELIVERED = 2;
    protected $guarded = ['id'];
    const UPDATED_AT = null;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getStatusAttribute($value)
    {
        switch ($value){
            case self::ORDERED:
                return 'سفارش داده شده';
            case self::INPROCESS:
                return 'در حال آماده سازی';
            case self::DELIVERED:
                return 'تحویل داده شده';
            default:
                return 'نامعتبر';
        }
    }
/*    public function food()
    {
        return $this->hasOne(Food::class);
//        return $this->belongsToMany(Food::class,'order_food','order_id','food_id');
    }*/
}
