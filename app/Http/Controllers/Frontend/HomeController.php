<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\Option;
use App\Utility\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show()
    {
        $foods = Food::all();
        $options = array();
        $configs = DB::table('options')->select('name', 'value')->get();
        foreach ($configs as $item) {
            if (!empty($item->value)) {
                $options[$item->name] = $item->value;
            }
        }
        $limitSpecials = isset($options['special_post_numbers']) ? $options['special_post_numbers'] : 4;
        $specials = Food::where('special', '1')->take($limitSpecials)->get();
        $limitCats = isset($options['menu_cat_numbers']) ? $options['menu_cat_numbers'] : 2;
        $categories = Category::all()->take($limitCats);
        return view("frontend.home.index", compact('foods', 'specials', 'categories', 'options'));
    }
}
