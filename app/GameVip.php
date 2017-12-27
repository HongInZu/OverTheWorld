<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameVip extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'game_predict_vip';

    protected $dates = ['deleted_at'];
}