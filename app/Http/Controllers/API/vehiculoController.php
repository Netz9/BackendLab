<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\vehiculo;
use App\Models\tipoPlaca;

class vehiculoController extends Controller
{
    // public function get(){
    //     try {
    //         $data = vehiculo::get();
    //         return response()->json($data, 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([ 'error' => $th->getMessage()], 500);
    //     }
    // }
    public function get()
    {
        try {
            $data = vehiculo::select('vehiculo.*', 'tipoPlaca.descripcion')
                ->join('tipoPlaca', 'vehiculo.tipoPlaca_id', '=', 'tipoPlaca.id')
                ->get();
            
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // public function create(Request $request){
    //     try {
    //         $data['nitPropietario'] = $request['nitPropietario'];
    //         $data['cuiPropietario'] = $request['cuiPropietario'];
    //         $data['nombrePropietario'] = $request['nombrePropietario'];
    //         $data['tipo'] = $request['tipo'];
    //         $data['marca'] = $request['marca'];
    //         $data['linea'] = $request['linea'];
    //         $data['modelo'] = $request['modelo'];
    //         $data['placa'] = $request['placa'];
    //         $data['vin'] = $request['vin'];
    //         $data['chasis'] = $request['chasis'];
    //         $data['color'] = $request['color'];
    //         $data['estadoActivo'] = $request['estadoActivo'];
    //         $res = vehiculo::create($data);
    //         return response()->json( $res, 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([ 'error' => $th->getMessage()], 500);
    //     }
    // }
    public function create(Request $request){
        try {
            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            // $data['tipoPlaca_id'] = $request['tipoPlaca_id'];
            $data['tipo'] = $request['tipo'];
            $data['placa'] = $request['placa'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];

            // Buscar la instancia de Placas según el tipo de uso seleccionado
            $placas = tipoPlaca::where('tipo', $request['tipoPlaca'])->first();
            if ($placas) {
                $data['tipoPlaca_id'] = $placas->id;
            }

            $res = vehiculo::create($data);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

//-------------------------------------------------------------------------------------- ESTO ALE
    public function getById($id){
        try {
            $data = vehiculo::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    // public function update(Request $request,$id){
    //     try {
    //         $data['nitPropietario'] = $request['nitPropietario'];
    //         $data['cuiPropietario'] = $request['cuiPropietario'];
    //         $data['nombrePropietario'] = $request['nombrePropietario'];
    //         $data['tipo'] = $request['tipo'];
    //         $data['marca'] = $request['marca'];
    //         $data['linea'] = $request['linea'];
    //         $data['modelo'] = $request['modelo'];
    //         $data['placa'] = $request['placa'];
    //         $data['vin'] = $request['vin'];
    //         $data['chasis'] = $request['chasis'];
    //         $data['color'] = $request['color'];
    //         $data['estadoActivo'] = $request['estadoActivo'];
    //         vehiculo::find($id)->update($data);
    //         $res = vehiculo::find($id);
    //         return response()->json( $res , 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([ 'error' => $th->getMessage()], 500);
    //     }
    // }
    public function update(Request $request, $id){
        try {
            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            // $data['tipoPlaca_id'] = $request['tipo'];
            $data['tipo'] = $request['tipo'];
            $data['placa'] = $request['placa'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];

            // Buscar la instancia de Placas según el tipo de uso seleccionado
            $placas = tipoPlaca::where('tipo', $request['tipoPlaca'])->first();
            if ($placas) {
                $data['tipoPlaca_id'] = $placas->id;
            }

            vehiculo::find($id)->update($data);
            if (!$vehiculo) {
                return response()->json(['error' => 'Registro no encontrado'], 404);
            }
            $res = vehiculo::find($id);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

//-------------------------------------------------------------------------------- ESTO ALE
    public function delete($id){
        try {
            $res = vehiculo::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);}}
}
