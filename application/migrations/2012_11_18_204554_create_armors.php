<?php

class Create_Armors {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('armors', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');

			/* info */
			$table->string('name', 64);
			$table->integer('user_id')->default(0);
			$table->integer('category_id')->default(0);
			$table->integer('class_id')->default(0);

			/* attr */
			$table->integer('health');
			$table->integer('health_max');
			$table->integer('in_use')->default(0);

			$table->integer('str');
			$table->integer('res');
			$table->integer('dex');
			$table->integer('vit');

			$table->integer('cosmo');

			$table->text('extras');
			$table->text('attacks');
		});

		Schema::create('categories', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('desc', 64);
		});

		$cats = array(
			'Aço',
			'Anjos Celestes',
			'Anjos da Morte',
			'Berserkers',
			'Bronze',
			'Coroa do Sol',
			'Elísios',
			'Fantasmas I',
			'Fantasmas II',
			'Gigas',
			'Guerreiros Deuses I',
			'Guerreiros Deuses II',
			'Kamuis',
			'Marinas',
			'Negras',
			'Ouro',
			'Prata',
			'Sapuris',
			'Titãs',
			'Yumekai'
		);

		foreach ($cats as $cat) {
			DB::table('categories')->insert(array(
				'desc' => $cat,
			));
		}

		Schema::create('classes', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('desc', 64);
			$table->integer('cosmo');
			$table->integer('cost');
		});

		$classes = array(
			array('S','99','70000'),
			array('A','54','50000'),
			array('B','37','30000'),
			array('C','15','15000'),
			array('D','2','5000'),
		);

		foreach ($classes as $class) {
			DB::table('classes')->insert(array(
				'desc' => $class[0],
				'cosmo' => $class[1],
				'cost' => $class[2],
			));
		}
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('armors');
		Schema::drop('categories');
		Schema::drop('classes');
	}

}