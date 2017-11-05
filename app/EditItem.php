<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditItem extends Model
{
    protected $connection = 'mysql';

    protected $table = 'item';
}