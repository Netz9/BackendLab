<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;

    protected $table = "vehiculo";

    protected $fillable = [
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
      'estadoActivo',
    ];

    public function setNombrePropietarioAttribute($value)
    {
        $this->attributes['nombrePropietario'] = ucwords($value);
    }

    public function placas()
{
    return $this->belongsTo(Placas::class, 'placas_id');
}
}