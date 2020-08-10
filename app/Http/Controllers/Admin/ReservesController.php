<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use Illuminate\Http\Request;

class ReservesController extends Controller
{
    public function index()
    {
        $reserves = Reserve::all();
        return view("admin.reserves.index",compact("reserves"))->with("panel_title","لیست رزروها");
    }
}
