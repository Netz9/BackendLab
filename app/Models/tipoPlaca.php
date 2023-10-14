<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPlaca extends Model
{
    use HasFactory;

    protected $table = "tipoPlaca";

    protected $fillable = [
      'id',
      'tipo',
      'descripcion'
    ];
    
    public function vehiculos()
    {
        return $this->hasMany(vehiculo::class);
    }
}