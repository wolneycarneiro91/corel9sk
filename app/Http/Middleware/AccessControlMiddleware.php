<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Auth\Access\AuthorizationException;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next)
    {        
        $string_dividida  = $this->dividirString($request->route()->getName());
        $modelRoute       = $string_dividida[0];
        $verboHttp        = $string_dividida[1];
        $permission_id    = $this->analisarTipoPermissao($verboHttp);
        $db = new DB();
        $db::enableQueryLog();
        $role_id    = auth()->user()->role_id;
        $model_id   =  $db::table('modelos')->where('name', $modelRoute)->value('id');
        // $role =  DB:table('users')->where('name', 'casasteste')->value('id');
        $autorizacao = intval($db::table('model_has_role_permissions')->where('role_id', $role_id)
            ->where('model_id', $model_id)
            ->where('permission_id', $permission_id)->value('permission_id'));
            //dd($autorizacao); 
            //$queries =   $db::getQueryLog();
            //dd( $queries);  
            $nao_atorizado = $this->mensagemAutorizacao($autorizacao);   
            if($nao_atorizado==''){
                return $next($request);      
            }  
            return $nao_atorizado;
                        
     
    }
    public function dividirString($string)
    {
        $partes = explode("-", $string);
        return $partes;
    }
    public function mensagemAutorizacao($flag){
        if($flag==0){
             return response()->json("Você não tem privilégios suficientes para acessar este módulo. Consulte o administrador", 406); ;
        }
    }    
    public function analisarTipoPermissao($verboHttp)
    {
        switch ($verboHttp) {
            case 'post':
                return 1;
                break;
            case 'get':
                return 2;
                break;
            case 'put':
                return 3;
                break;
            case 'delete':
                return 4;
                break;
        }
    }
}
