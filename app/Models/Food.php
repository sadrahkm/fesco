<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];

/*    public function order()
    {
        return $this->belongsTo(Order::class,'food_id');
//        return $this->belongsToMany(Order::class,'order_food','food_id','order_id');
    }*/
    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
}
