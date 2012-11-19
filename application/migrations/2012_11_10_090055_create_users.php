<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');

			/* info */
			$table->string('username', 32);
			$table->string('password', 64);
			$table->string('email', 64);
			$table->string('sex', 1)->nullable();
			$table->string('state', 32)->nullable();
			$table->string('role', 10)->default('User');

			/* attr */
			$table->integer('money')->default(200);
			$table->integer('merits')->default(10);
			$table->integer('armor_id')->default(0);

			/* status */
			$table->integer('cosmo')->default(200);
			$table->integer('cosmo_base')->default(200);

			$table->integer('str')->default(10);
			$table->integer('res')->default(8);
			$table->integer('dex')->default(8);
			$table->integer('vit')->default(9);

			$table->integer('stamina')->default(100);

			/* statics */
			$table->integer('wins')->default(0);
			$table->integer('loses')->default(0);

			$table->timestamps();
		});

		DB::table('users')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('admin')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}