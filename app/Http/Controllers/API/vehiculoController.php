<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;

class vehiculoController extends Controller
{
    public function getAll()
    {
        try {
            $data = vehiculo::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
