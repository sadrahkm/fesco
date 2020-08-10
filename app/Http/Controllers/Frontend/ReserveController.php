<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Reserve;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function verifyReserve(Request $request)
    {
        $this->validate($request, [
            "date" => "required",
            "people_count" => "required|numeric|max:50",
            "time" => "required|numeric|min:1|max:24",
        ]);
        $data["date"] = $request->input("date");
        $data["time"] = $request->input("time");
        $data["people_count"] = $request->input("people_count");
        $data['user'] = Auth::user();
        return view("frontend.reserve.reserve", compact('data'));
    }

    public function doReserve(Request $request)
    {
        $this->validate($request, [
            "date" => "required",
            "people_count" => "required|numeric|max:50",
            "time" => "required|numeric|min:1|max:24",
        ]);
        $user = Auth::user();
        $reserveDate = Carbon::parse($request->input("date"));
        $time = Carbon::createFromTime($request->input('time'))->toTimeString();
        $track_number = 0;
        $data = [
            "user_id" => $user->id,
            "reserved_at" => $reserveDate,
            "time" => $time,
            "people_count" => $request->input("people_count"),
            "track_number" => $track_number
        ];
        $result = Reserve::create($data);
        if($result){
            return redirect()->route("frontend.panel.reserves")->with("success","رزرو شما با موفقیت ثبت شد.");
        }
        return redirect()->back()->with("error","مشکلی در رزرو وجود دارد.");
    }
}
