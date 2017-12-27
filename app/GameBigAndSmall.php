<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameBigAndSmall extends Model
{
	use SoftDeletes;

    protected $connection = 'mysql';

    protected $table = 'game_predict_bigandsmall';

    protected $dates = ['deleted_at'];
}