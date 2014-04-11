<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatchPhrasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CatchPhrases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key', 255);
			$table->string('table', 255);
			$table->integer('idTable');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CatchPhrases');
	}

}
