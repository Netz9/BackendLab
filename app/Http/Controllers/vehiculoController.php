<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;

class vehiculoController extends Controller
{
    public function get(){
        try {
            $data = vehiculo::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            $data['tipo'] = $request['tipo'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['placa'] = $request['placa'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];
            $res = vehiculo::create($data);
            return response()->json( $res, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try {
            $data = vehiculo::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            $data['tipo'] = $request['tipo'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['placa'] = $request['placa'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];
            vehiculo::find($id)->update($data);
            $res = vehiculo::find($id);
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = vehiculo::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);}}
}
