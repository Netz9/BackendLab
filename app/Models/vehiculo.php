<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;

    protected $table = "vehiculo";

    protected $fillable = [
      'id',
      'nitPropietario',
      'cuiPropietario',
      'nombrePropietario',
      'tipo',
      'marca',
      'linea',
      'modelo',
      'placa',
      'vin',
      'chasis',
      'color',
      'estadoActivo'
    ];
}