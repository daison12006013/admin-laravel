<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUserHasRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_has_role', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('role_id')->references('id')->on('role');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_has_role', function(Blueprint $table)
		{
			//
		});
	}

}
