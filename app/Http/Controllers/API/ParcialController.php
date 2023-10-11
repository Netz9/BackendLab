<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcial;

class ParcialController extends Controller
{
    public function get(){
        try {
            $data = Parcial::get(); 
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['nombre'] = $request['nombre'];
            $data['universidad'] = $request['universidad'];
            $data['carrera'] = $request['carrera'];
            $res = Parcial::create($data); 
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try {
            $data = Parcial::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $data['id'] = $request['id'];
            $data['nombre'] = $request['nombre'];
            $data['universidad'] = $request['universidad'];
            $data['carrera'] = $request['carrera'];
            Parcial::find($id)->update($data); 
            $res = Parcial::find($id); 
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = Parcial::find($id)->delete(); 
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
