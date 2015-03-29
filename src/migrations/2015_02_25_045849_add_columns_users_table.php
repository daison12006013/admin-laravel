<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->timestamp('last_login')->index();
			$table->integer('login_attempts')->index()->nullable();
			$table->timestamp('next_possible_attempt')->index();
			$table->char('forgot_token', 100)->index()->nullable();

			$table->timestamp('forgot_token_expiration')->nullable();
			$table->timestamp('password_expiration')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn([
				'last_login',
				'login_attempts',
				'next_possible_attempt',
				'forgot_token',
				'forgot_token_expiration',
				'password_expiration',
			]);
		});
	}

}
