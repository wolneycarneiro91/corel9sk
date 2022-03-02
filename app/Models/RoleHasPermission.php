<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class RoleHasPermission extends Model implements Auditable
{
    protected $primaryKey = null;

    public $incrementing = false;
    use \OwenIt\Auditing\Auditable;    
    use SoftDeletes;    
    protected $dates = ['deleted_at'];
    protected $fillable = ["permission_id","role_id"];
}
