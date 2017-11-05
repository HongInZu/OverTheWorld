<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSetting extends Model
{
    protected $connection = 'mysql';

    protected $table = 'hotel_setting';
}