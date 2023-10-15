<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vehiculo;
use App\Models\tipoPlaca;

class vehiculoController extends Controller
{

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

   
    public function create(Request $request){
        try {
            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            $data['tipoplaca'] = $request['tipoplaca'];
            $data['placa'] = $request['placa'];
            $data['tipovehiculo'] = $request['tipovehiculo'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];

           //Busca el tipoplaca que coincide con la tabla tipoPlaca y le asigna el id correspondiente
            $tipoPlacaValue = $request->input('tipoplaca'); 

            if (!empty($tipoPlacaValue)) {
                $placas = tipoPlaca::where('tipo', $tipoPlacaValue)->first();
            
                if ($placas) {
                    $data['tipoPlaca_id'] = $placas->id;
                }
            }
            $res = vehiculo::create($data);
            return response()->json($res, 200);
          } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function getById($id){
        try {
            // Busca el vehículo por su ID
            $data = vehiculo::select('vehiculo.*', 'tipoPlaca.descripcion')
            ->join('tipoPlaca', 'vehiculo.tipoPlaca_id', '=', 'tipoPlaca.id')->find($id);

            return response()->json($data, 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

   
    public function update(Request $request, $id){
        try {

            $data['nitPropietario'] = $request['nitPropietario'];
            $data['cuiPropietario'] = $request['cuiPropietario'];
            $data['nombrePropietario'] = $request['nombrePropietario'];
            $data['tipoplaca'] = $request['tipoplaca'];
            $data['placa'] = $request['placa'];
            $data['tipovehiculo'] = $request['tipovehiculo'];
            $data['marca'] = $request['marca'];
            $data['linea'] = $request['linea'];
            $data['modelo'] = $request['modelo'];
            $data['vin'] = $request['vin'];
            $data['chasis'] = $request['chasis'];
            $data['color'] = $request['color'];
            $data['estadoActivo'] = $request['estadoActivo'];

            //Busca el tipoplaca que coincide con la tabla tipoPlaca y le asigna el id correspondiente
            $tipoPlacaValue = $request->input('tipoplaca'); 
            if (!empty($tipoPlacaValue)) {
                $placas = tipoPlaca::where('tipo', $tipoPlacaValue)->first();       
                if ($placas) {
                    $data['tipoPlaca_id'] = $placas->id;
                }
            }

            vehiculo::find($id)->update($data);
            $res = vehiculo::find($id);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $res = vehiculo::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);}}
}
