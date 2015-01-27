<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->char('email', 100)->index();
			$table->char('password', 100)->index();

			$table->char('first_name', 100)->index();
			$table->char('middle_name', 100)->index();
			$table->char('last_name', 100)->index();

			$table->char('employee_code', 100)->index();

			$table->string('remember_token');
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
		Schema::drop('users');
	}

}
