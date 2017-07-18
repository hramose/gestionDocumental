<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_departamento extends Model {

    use SoftDeletes;

    protected $table = 'tb_departamento';
    protected $primaryKey = 'ID_DEPARTAMNETO';
    protected $fillable = ['DESCRIPCION', 'OBSERVACION'];
    protected $guarded = ['ID_DEPARTAMNETO', 'ID_ESTACION', 'FECHA_INSERT', 'ESTADO'];

    public function estaciones() {
        return $this->hasMany('tb_estaciones', 'ID_ESTACION', 'ID_ESTACION');
    }
    public function pedidos(){
        return $this->hasMany('Soportem\Pedido', 'ID_DEPARTAMENTO');
    }

}