<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;

class Criticidad extends Model {

    protected $table = 'tb_criticidades';
    protected $primaryKey = 'ID_TABLA';
    protected $fillable = ['COD_CRITICIDAD', 'PRIORIDAD','DESCRIPCION','USUARIOS','TIEMPO_ATENCION','OBSERVACIONES','TIEMPO_ROJO', 'TIEMPO_AMARILLO'];



}
