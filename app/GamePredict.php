<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePredict extends Model
{
    protected $connection = 'mysql';

    protected $table = 'game_predict';
}