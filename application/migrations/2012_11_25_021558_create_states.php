<?php

class Create_States {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('uf', 2);
			$table->string('name', 32);
		});

		$states = array(
			array('Acre','AC'),
			array('Alagoas','AL'),
			array('Amapá','AP'),
			array('Amazonas','AM'),
			array('Bahia','BA'),
			array('Ceará','CE'),
			array('Distrito Federal','DF'),
			array('Espírito Santo','ES'),
			array('Goiás','GO'),
			array('Maranhão','MA'),
			array('Mato Grosso','MT'),
			array('Mato Grosso do Sul','MS'),
			array('Minas Gerais','MG'),
			array('Pará','PA'),
			array('Paraíba','PB'),
			array('Paraná','PR'),
			array('Pernambuco','PE'),
			array('Piauí','PI','Teresina'),
			array('Rio de Janeiro','RJ'),
			array('Rio Grande do Norte','RN'),
			array('Rio Grande do Sul','RS'),
			array('Rondônia','RO'),
			array('Roraima','RR'),
			array('Santa Catarina','SC'),
			array('São Paulo','SP'),
			array('Sergipe','SE'),
			array('Tocantins','TO')
		);

		foreach ($states as $state) {
			DB::table('states')->insert(array(
				'uf' => $state[1],
				'name' => $state[0],
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
		Schema::drop('states');
	}

}