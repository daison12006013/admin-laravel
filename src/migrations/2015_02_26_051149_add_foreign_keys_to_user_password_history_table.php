<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUserPasswordHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_password_history', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_password_history', function(Blueprint $table)
		{
			$table->dropForeign('user_password_history_user_id_foreign');
		});
	}

}
