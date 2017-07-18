<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbDepartamento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('tb_departamento', function(Blueprint $table)
		{
			//$table->increments('ID_DEPARTAMNETO');
                        / *$table->string("ID_ESTACION",3);
                        $table->string("DESCRIPCION",100);
                        $table->string("OBSERVACION",100); * /
                        $table->timestamps();
                        /*$table->boolean("ESTADO")->default(1);
                        $table->foreign('ID_ESTACION')*/
                        /*->references('ID_ESTACION')->on('tb_estaciones')
                        ->onDelete('cascade');* /
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/*Schema::table('tb_departamento', function(Blueprint $table)
		{
            $table->dropTimestamps();
		});*/
	}

}
