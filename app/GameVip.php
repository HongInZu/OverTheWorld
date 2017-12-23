<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameVip extends Model
{
    protected $connection = 'mysql';

    protected $table = 'game_predict_vip';
}