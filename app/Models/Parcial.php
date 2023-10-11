<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcial extends Model
{
    use HasFactory;

    protected $table = "examen";

    protected $fillable = [
      'id',
      'nombre',
      'universidad',
      'carrera'
    ];
}
