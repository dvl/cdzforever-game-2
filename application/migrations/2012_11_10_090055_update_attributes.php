<?php

class Update_Attributes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table(Config::get('sentry::sentry.table.users_metadata'), function($table) {
			$table->on(Config::get('sentry::sentry.db_instance'));

			$table->drop_column('first_name');
			$table->drop_column('last_name');

			/* info */
			$table->string('sex', 1)->nullable();
			$table->string('state', 32)->nullable();

			/* attr */
			$table->integer('money')->default(200);
			$table->integer('merits')->default(10);

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
		Schema::drop(Config::get('sentry::sentry.table.users_metadata'));
	}

}