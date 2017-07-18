<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorio extends Model {

    //
    protected $table = 'tb_directorios';

    use SoftDeletes;

    //protected $dates = ['deleted_at'];

}
