<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Proyectos extends Model
{
    protected $fillable = [
    'id',
    'nombre',
    'fecha_inicio',
    'estado',
    'responsable',
    'monto',
    'created_by', // ID de usuario que creó el proyecto
 ];

}
