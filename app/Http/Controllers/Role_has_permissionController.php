<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Role_has_permissionRequest;
use App\Models\Role_has_permission;

class Role_has_permissionController extends Controller
{
    protected $role_has_permission;
    public function __construct(Role_has_permission $role_has_permission){
            $this->role_has_permission = $role_has_permission;        
    } 
    public function index()
    {                           
        $data = $this->role_has_permission->all();
        return response()->json($data, 201);                
    }
    public function store(Role_has_permissionRequest $request)
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
    public function update(Role_has_permissionRequest $request, $id)
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
             return response()->json('Não foi possível atualizar', 406);
            }                             
    }

    // public function delete($id)
    // {
    //     $data = $this->role_has_permission->find($id);
    //     if(!$data){
    //         return response()->json(['error'=>'Nada foi encontrado'],404) ;
    //     }
    //      DB::beginTransaction();
    //      try {  
    //             $data->delete();
    //             DB::commit(); 
    //             return response()->json(['success'=>'Deletado com sucesso.'],201) ; 
    //      }
    //     catch (\Exception $e)
    //          {
    //             DB::rollback();
    //             return response()->json('Não foi possível excluir', 406);
    //         }                
    // }    
    
}
