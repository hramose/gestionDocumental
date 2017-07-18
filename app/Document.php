<?php namespace Soportem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {

	//
    protected $table = 'tb_documents';

    use SoftDeletes;

    //protected $dates = ['deleted_at'];

}
