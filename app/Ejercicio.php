<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $fillable = ['id', 'name', 'phone','address','email']; // Se registran en arreglo los campos de la tabla para acceder a ellos desde una unica clase de modelo
}
