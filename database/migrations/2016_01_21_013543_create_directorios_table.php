<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoriosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_directorios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("nombre");
			$table->string("encargado");

			$table->string("mail_req");
			$table->string("extencion");
			$table->string("celular");

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_directorios');
	}

}
