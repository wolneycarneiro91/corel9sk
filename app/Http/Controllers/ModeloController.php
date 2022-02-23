<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ModeloRequest;
use App\Models\Modelo;

class ModeloController extends Controller
{
    protected $modelo;
    public function __construct(Modelo $modelo){
            $this->modelo = $modelo;        
    } 
    public function index()
    {                           
        $data = $this->modelo->all();
        return response()->json($data, 201);                
    }
    public function store(ModeloRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->modelo->create($dataFrom);  
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
        $data = $this->modelo->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(ModeloRequest $request, $id)
    { 
        $data = $this->modelo->find($id);  
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
        $data = $this->modelo->find($id);
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
