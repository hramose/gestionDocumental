<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_documents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('identificador_letras');
			$table->integer('identificador_numero');
			$table->string('identificador');
			$table->enum('tipo_documento', ['oficio', 'memo']);
			$table->string('observaciones_doc');
			$table->string('requerimiento');
			$table->string('solicitante');
			$table->string('formato_numero');
			//$table->uuid('unico_dato');
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
		Schema::drop('tb_documents');
	}

}
