<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\HotelReposible;
use App\HotelSetting;
use App\HotelSpecialDay;
use App\HotelStyle;
use DB;
use Carbon\Carbon;

class EditHotelController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getIndex($id)
    {
        //
    }

    /**
     * 回應對 GET /edititem/todb 的請求
     */
    public function postToHotel(Request $request)
    {
        if (!empty($request->id)) {
            $hotel = Hotel::find($request->id);
        } else {
            $hotel = new Hotel;
        }
        $requestArr = ['name_zh-tw', 'name_zh-cn', 'name_en', 'company_name', 'hotel_registration_number', 'uniform_numbers', 'phone_number', 'fax_number', 'e-mail', 'latitude', 'longitude', 'address_zh-tw', 'address_zh-cn', 'address_en', 'content_zh-tw', 'content_zh-cn', 'content_en'];
        $requestTime = ['check_in', 'check_out'];
        foreach ($requestArr as $key => $value) {
            if (isset($request->{$value})) {
                $hotel->{$value} = $request->{$value};
            } else {
                $hotel->{$value} = '';
            }
        }

        foreach ($requestTime as $key => $value) {
            if (isset($request->{$value})) {
                $hotel->{$value} = Carbon::parse($request->{$value})->toTimeString();
            } else {
                $hotel->{$value} = '';
            }
        }

        if ($hotel->save()) {
                return redirect('admin/manage-hotel/hotel');
        } else {
            return redirect('admin/manage-hotel/hotel');
        }
    }

    /**
     * 回應對 GET /users/food/1 的請求
     */
    public function getHotel($id = null)
    {
        if ($id != null) {
            $hotel = Hotel::find($id);
            return view('admin.room-edit.hotel', ['hotel' => $hotel]);
        } else {
            return view('admin.room-edit.hotel', ['hotel' => []]);
        }
    }

    /**
     * 回應對 GET /users/food/1 的請求
     */
    public function getHotelStyle($id = null)
    {

        return view('admin.room-edit.hotel-style', [
                                                    'id' => $id,
                                                    'needs' => DB::table('hotel_tag')->where('type', '特殊需求')->get(),
                                                    'facility' => DB::table('hotel_tag')->where('type', '設施及服務')->get(),
                                                    'network' => DB::table('hotel_tag')->where('type', '客房網路')->get(),
                                                    'parking' => DB::table('hotel_tag')->where('type', '停車服務')->get(),
                                                    'leisure' => DB::table('hotel_tag')->where('type', '運動、休閒設施')->get(),
                                                    'equipment' => DB::table('hotel_tag')->where('type', '設備')->get(),
                                                    'hardware' => DB::table('hotel_tag')->where('type', '硬體')->get(),
                                                    'bathroom' => DB::table('hotel_tag')->where('type', '衛浴')->get(),
                                                    'service' => DB::table('hotel_tag')->where('type', '服務')->get(),
                                                    'holiday' => DB::table('hotel_tag')->where('type', '假期')->get(),
                                                    'terms' => DB::table('hotel_tag')->where('type', '飯店條款')->get(),
                                                    ]);
    }

    /**
     * 回應對 GET /users/admin-profile 的請求
     */
    public function getHotelFeature($id)
    {
        $hotel_Reposible_Todb = HotelReposible::where('hotel_id', $id)->first();
        $hotel_Setting_Todb = HotelSetting::where('hotel_id', $id)->first();

        return view('admin.room-edit.hotel-feature', [
                                                    'id' => $id,
                                                    'hotel_Reposible' => $hotel_Reposible_Todb,
                                                    'hotel_Setting' => $hotel_Setting_Todb,
                                                    'needs' => DB::table('hotel_tag')->where('type', '特殊需求')->get(),
                                                    'facility' => DB::table('hotel_tag')->where('type', '設施及服務')->get(),
                                                    'network' => DB::table('hotel_tag')->where('type', '客房網路')->get(),
                                                    'parking' => DB::table('hotel_tag')->where('type', '停車服務')->get(),
                                                    'leisure' => DB::table('hotel_tag')->where('type', '運動、休閒設施')->get(),
                                                    'equipment' => DB::table('hotel_tag')->where('type', '設備')->get(),
                                                    'hardware' => DB::table('hotel_tag')->where('type', '硬體')->get(),
                                                    'bathroom' => DB::table('hotel_tag')->where('type', '衛浴')->get(),
                                                    'service' => DB::table('hotel_tag')->where('type', '服務')->get(),
                                                    'holiday' => DB::table('hotel_tag')->where('type', '假期')->get(),
                                                    'terms' => DB::table('hotel_tag')->where('type', '飯店條款')->get(),
                                                    ]);
    }

    /**
     * 回應對 POST /users/profile 的請求
     */
    public function postProfile()
    {
        //
    }

    /**
     * 回應對 POST /users/profile 的請求
     */
    public function postSaveSpecialDay(Request $request)
    {
        $special_Day = ['date', 'title', 'price', 'cost', 'point', 'room_count', 'hotel_id'];
        $hotel_Special_Day_Todb = HotelSpecialDay::where('hotel_id', $request->hotel_id)
                                  ->where('date', $request->date)
                                  ->first();
        if (empty($hotel_Special_Day_Todb)) {
            $hotel_Special_Day_Todb = new HotelSpecialDay;
        } else {
            $hotel_Special_Day_Todb = HotelSpecialDay::find($hotel_Special_Day_Todb->id);
        }

        foreach ($special_Day as $key => $value) {
            $hotel_Special_Day_Todb->{$value} = $request->{$value};
        }
        if ($hotel_Special_Day_Todb->save()) {
            return response()->json(array(
                'status' => '儲存成功',
                'id' => $request->id,
            )); 
        } else {
            return response()->json(array(
                'status' => '儲存失敗',
                'id' => $request->id,
            )); 
        }  
    }

    /**
     * 回應對 POST /users/profile 的請求
     */
    public function postSaveSetting(Request $request)
    {
        $id = $request->id;

        if (empty(Hotel::find($request->id))) {
            return response()->json(array(
                'response' => $request->all(),
            ));  
        }

        $hotel_Reposible = ['accountant_e-mail', 'accountant_fax', 'accountant_mobile_phone', 'accountant_name', 'accountant_phone', 'department_1', 'department_2', 'e-mail_1', 'e-mail_2', 'job_title_1', 'job_title_2', 'mobile_phone_1', 'mobile_phone_2', 'name_1', 'name_2', 'phone_1', 'phone_2'];

        $hotel_Setting = ['service_charge', 'breakfast_fee', 'city_center', 'airport', 'bar', 'floor', 'restaurant', 'room', 'service_time', 'voltage', 'airport_time', 'status', 'star', 'mobile'];
        $hotel_Setting_Year = ['decoration_year', 'open_year'];
        $hotel_Setting_JSON = ['type', 'need', 'payment_method', 'facility', 'network', 'parking', 'leisure', 'equipment', 'hardware', 'bathroom', 'service', 'holiday', 'terms'];

        $hotel_Reposible_Todb = HotelReposible::where('hotel_id', $id)->first();
        if (empty($hotel_Reposible_Todb)) {
            $hotel_Reposible_Todb = new HotelReposible;
            $hotel_Reposible_Todb->hotel_id = $id;
        } else {
            $hotel_Reposible_Todb = HotelReposible::find($hotel_Reposible_Todb->id);
        }

        $hotel_Setting_Todb = HotelSetting::where('hotel_id', $id)->first();
        if (empty($hotel_Setting_Todb)) {
            $hotel_Setting_Todb = new HotelSetting;
            $hotel_Setting_Todb->hotel_id = $id;
        } else {
            $hotel_Setting_Todb = HotelSetting::find($hotel_Setting_Todb->id);
        }

        foreach ($hotel_Reposible as $key => $value) {
            $hotel_Reposible_Todb->{$value} = $request->{$value};
        }

        foreach ($hotel_Setting_Year as $key => $value) {
            $hotel_Setting_Todb->{$value} = Carbon::parse($request->{$value})->toDateString();
        }

        foreach ($hotel_Setting as $key => $value) {
            $hotel_Setting_Todb->{$value} = $request->{$value};
        }

        foreach ($hotel_Setting_JSON as $key => $value) {
            $hotel_Setting_Todb->{$value} = json_encode($request->{$value});
        }

        if ($hotel_Reposible_Todb->save() && $hotel_Setting_Todb->save()) {
            return response()->json(array(
                'status' => '儲存成功',
                'id' => $request->id,
            )); 
        } else {
            return response()->json(array(
                'status' => '儲存失敗',
                'id' => $request->id,
            )); 
        }  
    }
}