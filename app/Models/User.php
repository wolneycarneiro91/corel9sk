<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\UserResolver;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Support\Facades\Auth;

//class User extends Authenticatable implements AuditableContract, UserResolver
class User extends Authenticatable
{
    //use Auditable;
    
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public static function resolve()
    // {
    //     return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
        
    // }    
}
