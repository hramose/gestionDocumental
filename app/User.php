<?php namespace Soportem;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;



class User extends Model  implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable,  CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tb_usuarios';
	protected $primaryKey = 'ID_USUARIOS';

	public function getAuthIdentifier()
	{
		//return $this->email; //should be changed to
		return $this->ID_USUARIOS;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['USUARIO', 'CLAVE', 'NOMBRE',   'CORREO_CORPORATIVO',
		'CORREO_PERSONAL',
		'TELEFONO',
		'CELULAR_CORPORATIVO',
		'CELULAR_PERSONAL',
		'AREA',
		'FECHA_INSERT',
		'FECHA_UPDATE',
		'ESTADO',
		'USER_NIVEL',];
	protected $map = [
		'CLAVE' => 'password',
		//'ID_USUARIOS' => 'id',
		'USUARIO' => 'username',
		'CORREO_CORPORATIVO' => 'email',
	];

	protected $appends = [
		'id'
	];

	public function getIdAttribute()
	{
		return $this->attributes['ID_USUARIOS'];
	}


	protected $mappedOnly = true;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['ID_USUARIOS','CLAVE'];
	public function  getAuthPassword(){
		return $this->CLAVE;
	}
	//protected $guarded = array('id', 'ID_USUARIOS');

}
