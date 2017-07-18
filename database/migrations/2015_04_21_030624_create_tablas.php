<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('nerds2', function(Blueprint $table) {
        $table->increments('id');

        $table->string('name', 255);
        $table->string('email', 255);
        $table->integer('nerd_level');

        $table->timestamps();
        $table->softDeletes();
    });*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::table('nerds2', function(Blueprint $table) {
            //
            //Schema::drop('nerds');
        });
	}

}
