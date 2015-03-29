<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('log', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->foreign('actor_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('log', function(Blueprint $table)
		{
			$table->dropForeign('log_actor_id_foreign');
		});
	}

}
