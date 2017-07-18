<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    protected $table = 'pedidos';
    protected $primaryKey = 'ID_PETICION';

    protected $fillable = [
        'NOMBRE',
        'CANTIDAD',
        'ESTACION',
        'TIPO',
        'PROBLEMA',
        'COD_EMPLEADO_SOPORTE',
        'ESTADO',
        'FECHA_PEDIDO',
        'FECHA_SOLUCION',
        'ASIGNADO',
        'SOLUCION',
        'MAIL_REQ',
        'FECHA_ASIGNACION',
        'AREA',
        'REASIGNADO',
        'FECHA_REASIGNACION',
        'MOTIVO_REASIGNACION',
        'PRIORIDAD',
        'EXTENCION',
        'CELULAR',
        'IP_1',
        'IP_2',
        'ID_DEPARTAMENTO',
        'TITULO',
        'UNIQ',
        'VUELO',
        'CIUDAD_IATA',
        'SEGUIMIENTO'
    ];
    protected $guarded = ['UNIQ','ID_DEPARTAMENTO'];
    public $timestamps = false;

    public function scopeActivo($query)
    {
        return $query->where('ESTADO', '=', 'EN PROCESO');
    }
    public function scopeWhoActivo($query)
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

    public function scopeAsignado($query,$asignado)
    {
        return $query->where('ASIGNADO','$asignado');
    }
    public function criticidad() {
        return $this->belongsTo('Soportem\tb_criticidades', 'PRIORIDAD', 'PRIORIDAD');
    }

}
