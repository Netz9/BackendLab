<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscripcion;

class InscripcionController extends Controller
{
    public function get(){
        try {
            $data = Inscripcion::get(); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['nombre'] = $request['nombre'];
            $data['seccion'] = $request['seccion'];
                if($request['tipodeInscripcion']==1){
                $data['tipodeInscripcion']="Permanente";
            }else if($request['tipodeInscripcion']==0){
                $data['tipodeInscripcion']="Oyente";
            }else{
                $data['tipodeInscripcion']="No definido";
            }
            $res = Inscripcion::create($data); 
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try {
            $data = Inscripcion::find($id); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $data['id'] = $request['id'];
            $data['nombre'] = $request['nombre'];
            $data['seccion'] = $request['seccion'];
            if($request['tipodeInscripcion']==1){
                $data['tipodeInscripcion']="Permanente";
            }else if($request['tipodeInscripcion']==0){
                $data['tipodeInscripcion']="Oyente";
            }else{
                $data['tipodeInscripcion']="No definido";
            }
            Inscripcion::find($id)->update($data); // Cambiamos "Tarea" por "tarea" en minúsculas
            $res = Inscripcion::find($id); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = Inscripcion::find($id)->delete(); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
