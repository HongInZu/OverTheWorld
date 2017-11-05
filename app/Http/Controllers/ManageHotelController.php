<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelReponsible;
use App\HotelSpecialDay;
use DB;


class ManageHotelController extends Controller
{
    /**
     * 回應對 GET /manageitem/food 的請求
     */
    public function getIndex()
    {

    }

    public function getRoom($id)
    {
        $days = HotelSpecialDay::where('hotel_id', $id)->get();
        $date = [];

        foreach ($days as $key => $value) {
            $date[$value['date']] = $value;
        }
        $days_json = json_encode($date);
        return view('admin.room-manage.room', [
                                                'hotel_id' => $id,
                                                'days' => $date,
                                                'days_json' => $days_json
                                            ]);
    }

    public function getAccount()
    {
        return view('admin.room-manage.account');
    }

    public function getHotel()
    {
        $hotel = Hotel::leftJoin('hotel_reposible', 'hotel.id', '=', 'hotel_reposible.hotel_id')
                    ->select('hotel.id', 'hotel_reposible.phone_1', 'hotel_reposible.name_1', 'hotel_reposible.department_1', 'hotel_reposible.job_title_1','hotel_reposible.phone_1', 'hotel.name_zh-tw', 'hotel.updated_at', 'hotel.created_at')
                    ->get();
        return view('admin.room-manage.hotel', ['hotels' => $hotel]);
    }

    public function getHotelStyle($id)
    {
        return view('admin.room-manage.hotel-style', ['id' => $id]);
    }
}