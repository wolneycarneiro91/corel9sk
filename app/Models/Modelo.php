<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Modelo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;    
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["name"];
}
