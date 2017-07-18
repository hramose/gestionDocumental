<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_criticidades extends Model {



    protected $table = 'tb_criticidades';
    protected $primaryKey = 'ID_TABLA';
    protected $fillable = ['COD_CRITICIDAD','PRIORIDAD','DESCRIPCION','USUARIOS','TIEMPO_ATENCION','OBSERVACIONES','TIEMPO_ROJO','TIEMPO_AMARILLO'];
   // protected $guarded = ['COD_CRITICIDAD','PRIORIDAD','DESCRIPCION','USUARIOS','TIEMPO_ATENCION','OBSERVACIONES','TIEMPO_ROJO','TIEMPO_AMARILLO'];

    public function pedidos() {
        return $this->hasMany('Soportem\Pedido', 'PRIORIDAD', 'PRIORIDAD');
    }
    public function scopeActivo($query)
    {
        return $query->where('ESTADO', '=', 'EN PROCESO');
    }

    public function scopeCompletado($query)
    {
        return $query->where('ESTADO', '=', 'COMPLETADO');
    }
    public function scopeStandBy($query)
    {
        return $query->where('ESTADO', '=', 'STAND BY');
    }

}