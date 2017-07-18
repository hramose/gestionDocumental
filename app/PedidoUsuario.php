<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;

class PedidoUsuario extends Model {

    protected $table = 'tb_pedido_usuarios';
    protected $primaryKey = 'ID_PEDIDO_USUARIOS';
    protected $fillable = [
        'ID_PETICION'	,
        'ID_USUARIOS'	,
        'TIPO'	,
        'ESTADO'	,
        'FECHA_INSERT'	,
        'FECHA_UPDATE'	,
        'FECHA_INI'	,
        'FECHA_FIN'	,
        'TOTAL'	,
        'DESCRIPCION'	,
    ];



}
