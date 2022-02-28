<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ModelHasPermissionRequest;
use App\Models\ModelHasPermission;

class ModelHasPermissionController extends Controller
{
    protected $modelhaspermission;
    public function __construct(ModelHasPermission $modelhaspermission){
            $this->modelhaspermission = $modelhaspermission;        
    } 
    public function index()
    {                           
        $data = $this->modelhaspermission->all();
        return response()->json($data, 201);                
    }
    public function store(ModelHasPermissionRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->modelhaspermission->create($dataFrom);  
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
        $data = $this->modelhaspermission->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(ModelHasPermissionRequest $request, $id)
    { 
        $data = $this->modelhaspermission->find($id);  
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
        $data = $this->modelhaspermission->find($id);
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
