<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GamePredict extends Model
{    
	use SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'game_predict';

    protected $dates = ['deleted_at'];
}