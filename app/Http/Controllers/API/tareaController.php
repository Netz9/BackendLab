<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tarea; // Cambiamos "Tarea" por "tarea" en minúsculas

class tareaController extends Controller
{
    public function get(){
        try {
            $data = tarea::get(); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['NombreTarea'] = $request['NombreTarea'];
            $data['Curso'] = $request['Curso'];
            $data['Completado'] = $request['Completado'];
            $data['Alumno'] = $request['Alumno'];
            $res = tarea::create($data); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try {
            $data = tarea::find($id); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $data['NombreTarea'] = $request['NombreTarea'];
            $data['Curso'] = $request['Curso'];
            $data['Completado'] = $request['Completado'];
            $data['Alumno'] = $request['Alumno'];
            tarea::find($id)->update($data); // Cambiamos "Tarea" por "tarea" en minúsculas
            $res = tarea::find($id); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = tarea::find($id)->delete(); // Cambiamos "Tarea" por "tarea" en minúsculas
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
