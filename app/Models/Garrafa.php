<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garrafa extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["cor","peso"];
}
