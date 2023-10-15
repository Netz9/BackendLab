<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tipoPlaca;

class tipoplacaController extends Controller
{
         public function get(){
         try {
             $data = tipoPlaca::get();
             return response()->json($data, 200);
         } catch (\Throwable $th) {
             return response()->json([ 'error' => $th->getMessage()], 500);
         }
         }

         public function getById($id){
            try {
                $data = tipoPlaca::find($id);
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                return response()->json([ 'error' => $th->getMessage()], 500);
            }
        }
    
}
