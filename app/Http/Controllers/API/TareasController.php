<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tareas;

class TareasController extends Controller
{
    public function get(){
        try {
            $data = Tareas::get(); 
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    public function create(Request $request){
        try {
            $data['nombre'] = $request['nombre'];
            $data['descripcion'] = $request['descripcion'];
            $data['state'] = 1;    
            $res = Tareas::create($data); 
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    
    public function getById($id){
        try {
            $data = Tareas::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $data['id'] = $request['id'];
            $data['nombre'] = $request['nombre'];
            $data['descripcion'] = $request['descripcion'];
            $data['state'] = $request['state'];
            Tareas::find($id)->update($data); 
            $res = Tareas::find($id); 
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = Tareas::find($id)->delete(); 
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
