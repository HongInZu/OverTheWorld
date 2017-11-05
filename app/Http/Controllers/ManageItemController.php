<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EditItem;


class ManageItemController extends Controller
{
    /**
     * 回應對 GET /manageitem/food 的請求
     */
    public function getIndex()
    {

    }

    public function getFood($id = null)
    {
        return view('admin.item-manage.food', ['items' => EditItem::where('item_type', 'food')->orderBy('orderby')->get()]);
    }

    public function getTrafic($id = null)
    {
        return view('admin.item-manage.trafic', ['items' => EditItem::where('item_type', 'trafic')->orderBy('orderby')->get()]);
    }

    public function getFunny($id = null)
    {
        return view('admin.item-manage.funny', ['items' => EditItem::where('item_type', 'funny')->orderBy('orderby')->get()]);
    }

    public function postStatusChange(Request $request)
    {
        $item = EditItem::find($request->id);
        if (!empty($item)) {
            $item->status = $request->status;
            if ($item->save()) {
                return response()->json(array(
                    'status' => $request->status,
                    'id' => $request->id,
                ));
            } else {
                return response()->json(array(
                    'status' => '儲存失敗',
                ));
            }
        } else {
            return response()->json(array(
                'status' => '找不到商品',
            ));
        }
    }

    public function postSortChange(Request $request)
    {
        $item = EditItem::find($request->id);
        if (!empty($item)) {
            $item->orderby = $request->orderby;
            if ($item->save()) {
                return response()->json(array(
                    'orderby' => $item->orderby,
                    'id' => $request->id,
                ));
            } else {
                return response()->json(array(
                    'status' => '儲存失敗',
                ));
            }
        } else {
            return response()->json(array(
                'status' => '找不到商品',
            ));
        }
    }
}