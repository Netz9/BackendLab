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
      'tipoplaca',
      'tipoPlaca_id',
      'placa',
      'tipovehiculo',
      'marca',
      'linea',
      'modelo',
      'vin',
      'chasis',
      'color',
      'estadoActivo'
    ];
    
    public function tipoPlaca()
    {
      return $this->belongsTo(tipoPlaca::class, 'tipoPlaca_id');
    }
}