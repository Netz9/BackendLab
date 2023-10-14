<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;

    protected $table = "tipoPlaca";

    protected $fillable = [
      'tipo',
      'descripcion'
    ];
    
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}