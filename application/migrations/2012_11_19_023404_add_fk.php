<?php

class Add_Fk {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('armors', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->foreign('class_id')->references('id')->on('classes');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('armors', function($table) {
			$table->drop_foreign('armors_class_id_foreign');
			$table->drop_foreign('armors_category_id_foreign');
			$table->drop_foreign('armors_user_id_foreign');
		});
	}
}