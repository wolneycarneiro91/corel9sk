<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuditorialogRequest;
use App\Models\Auditorialog;

class AuditorialogController extends Controller
{
    public function __construct(Auditorialog $auditorialog){
            $this->auditorialog = $auditorialog;        
    } 
    public function index()
    {                           
        $data = $this->auditorialog->all();
        return response()->json($data, 201);                
    }
    public function store(AuditorialogRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->auditorialog->create($dataFrom);  
            DB::commit(); 
            //return response()->json($data,201) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            //return response()->json('Não foi possível logar', 406);
        }             
    }
    public function show($id)
    {
        $data = $this->auditorialog->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    } 
 
    
}
