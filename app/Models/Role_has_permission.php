<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Role_has_permission extends Model 
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;                  
    protected $fillable = ["role_id","permission_id"];
}
