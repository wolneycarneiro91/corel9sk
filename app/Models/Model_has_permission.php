<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Model_has_permission extends Model implements Auditable
{
    protected $primaryKey = null;
    public $incrementing = false;    
    use \OwenIt\Auditing\Auditable;    
    use SoftDeletes;    
    protected $dates = ['deleted_at'];
    protected $fillable = ["permission_id","model_id","model_type"];
}
