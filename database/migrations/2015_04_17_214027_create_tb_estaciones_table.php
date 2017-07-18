<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbEstacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('tb_estaciones', function(Blueprint $table)
		{
			/ * //$table->increments('id');
                        $table->string("ID_ESTACION",3)->unique();
                        $table->string("ESTACION",30);
                        $table->string("OBSERVACIONES",100);
			$table->timestamps();
                        $table->primary('ID_ESTACION');* /
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('tb_estaciones');
	}

}
