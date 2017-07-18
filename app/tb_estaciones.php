<?php

namespace Soportem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_estaciones extends Model {

    protected $table = 'tb_estaciones';
    protected $primaryKey = 'ID_ESTACION';
    protected $fillable = ['ESTACION', 'OBSERVACIONES'];
    protected $guarded = ['ID_ESTACION'];

    //use RemindableTrait;
    //use SoftDeletingTrait;


    use SoftDeletes;

    //protected $dates = ['deleted_at'];

    public function estaciones() {
        return $this->hasMany('tb_departamento', 'ID_ESTACION', 'ID_ESTACION');
    }

}


/*ALTER TABLE larevel.tb_estaciones
 DROP deleted_at,
 ADD created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00' AFTER OBSERVACIONES,
 ADD updated_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
 ADD deleted_at TIMESTAMP;
*/