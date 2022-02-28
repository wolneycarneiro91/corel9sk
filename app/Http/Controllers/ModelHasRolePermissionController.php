<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ModelHasRolePermissionRequest;
use App\Models\ModelHasRolePermission;

class ModelHasRolePermissionController extends Controller
{
    protected $modelhasrolepermission;
    public function __construct(ModelHasRolePermission $modelhasrolepermission){
            $this->modelhasrolepermission = $modelhasrolepermission;        
    } 
    public function index()
    {                           
        $data = $this->modelhasrolepermission->all();
        return response()->json($data, 201);                
    }
    public function store(ModelHasRolePermissionRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->modelhasrolepermission->create($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            return response()->json('Não foi possível cadastrar', 406);
        }             
    }
    public function show($id)
    {
        $data = $this->modelhasrolepermission->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(ModelHasRolePermissionRequest $request, $id)
    { 
        $data = $this->modelhasrolepermission->find($id);  
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

    public function delete($id)
    {
        $data = $this->modelhasrolepermission->find($id);
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
                return response()->json('Não foi possível excluir', 406);
            }                
    }    
    
}
