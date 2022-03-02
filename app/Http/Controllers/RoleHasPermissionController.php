<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoleHasPermissionRequest;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RoleHasPermissionController extends Controller
{
    protected $role_has_permission;
    public function __construct(RoleHasPermission $role_has_permission){
            $this->role_has_permission = $role_has_permission;        
    } 
    public function index()
    {                           
        $data = $this->role_has_permission->all();
        return response()->json($data, 201);                
    }
    public function store(RoleHasPermissionRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->role_has_permission->create($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            $user = Auth::user();
            Log::error('Não foi possível cadastrar'.$e.'  usuário: '.$user['name']);  
            return response()->json('Não foi possível cadastrar'.$e, 406);
        }             
    }
    public function show($id)
    {
        $data = $this->role_has_permission->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(RoleHasPermissionRequest $request, $id)
    { 
        $data = $this->role_has_permission->find($id);  
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        } 
        $this->validate($request, $request->rules());    
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {          
            $data->update($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;    
            }
        catch (\Exception $e)
             {
             DB::rollback();
             $user = Auth::user();
             Log::error('Não foi possível atualizar'.$e.'  usuário: '.$user['name']);  
             return response()->json('Não foi possível atualizar', 406);
            }                             
    }

    public function delete($id)
    {
        $data = $this->role_has_permission->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
         DB::beginTransaction();
         try {  
                $data->delete();
                DB::commit(); 
                return response()->json(['success'=>'Deletado com sucesso.'],201) ; 
         }
        catch (\Exception $e)
             {
                DB::rollback();
                $user = Auth::user();
                Log::error('Não foi possível excluir'.$e.'  usuário: '.$user['name']);                  
                return response()->json('Não foi possível excluir', 406);
            }                
    }    
    
}
