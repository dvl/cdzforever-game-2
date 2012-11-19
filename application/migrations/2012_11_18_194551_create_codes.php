<?php

class Create_Codes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('codes', function($table) {
			$table->engine = 'InnoDB';

			$table->integer('user_id')->unsigned();
			$table->string('code', 32);
	
			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('codes');
	}

}