<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable = [
    'nombre',
    'fecha_inicio',
    'estado',
    'responsable',
    'monto',
 ];

}
