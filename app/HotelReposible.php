<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelReposible extends Model
{
    protected $connection = 'mysql';

    protected $table = 'hotel_reposible';
}