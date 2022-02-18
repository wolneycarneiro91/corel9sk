<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CanecaRequest;
use App\Models\Caneca;
use App\Models\Auditorialog;



class CanecaController extends Controller
{
    public function __construct(Caneca $caneca, Auditorialog $auditoria){
            $this->caneca = $caneca;        
            $this->auditoria = $auditoria;        
    } 
    public function index()
    {                           
        $data = $this->caneca->all();
        return response()->json($data, 201);                
    }
    public function store(CanecaRequest $request)
    {

        //if($request->validated('campo1')){
            //$this->validate($request, $request->rules());   
            $dataFrom = $request->all();
            DB::beginTransaction();
            try {        
                $data = $this->caneca->create($dataFrom);  
                $this->auditoria->create([
                    'id_usuario'=> 1,
                    'conteudo'=> json_encode($dataFrom),
                    'operacao'=>'create'
                ]);                
                DB::commit(); 
                return response()->json($data,201) ;
            } 
            catch (\Exception $e) {
                DB::rollback();
                $this->auditoria->create([
                    'conteudo'=> $e->getMessage(),
                    'operacao'=>'create'
                ]);                
                return response()->json('Não foi possível cadastrar', 406);
            }                 
    }
    public function show($id)
    {
        $data = $this->caneca->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(CanecaRequest $request, $id)
    { 
        $data = $this->caneca->find($id);  
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

    public function destroy($id)
    {
        $data = $this->caneca->find($id);
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
