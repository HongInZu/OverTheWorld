<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GamePredict;
use App\Image;
use App\Legend;
use Carbon\Carbon;

class AddLegendController extends Controller
{
    public function getLegendTable()
    {
        return view('admin.manage.legend', ['results' => Legend::get()]);
    }
}