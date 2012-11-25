<?php

class Create_Invites {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invites', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('used_by')->unsigned()->nullable();
			$table->string('code', 32);

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('used_by')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invites');
	}

}