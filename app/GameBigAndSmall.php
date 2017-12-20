<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameBigAndSmall extends Model
{
    protected $connection = 'mysql';

    protected $table = 'game_predict_bigandsmall';
}