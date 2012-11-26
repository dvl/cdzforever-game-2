<?php

class Vw_Profile_Data {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::connection(Config::get('sentry::sentry.db_instance'))->pdo->query("CREATE VIEW `vw_profile_data` AS
				SELECT 
				u.id, u.username, u.email, u.ip_address, u.last_login, u.created_at,
				replace(replace(attr.sex, 'M', 'Masculino'), 'F', 'Feminino') as user_sex, attr.money AS user_money, attr.cosmo AS user_cosmo, attr.cosmo_base AS user_cosmo_base, attr.str AS user_str, attr.res AS user_res, attr.dex AS user_dex, attr.vit AS user_vit, attr.stamina AS user_stamina, attr.wins AS user_wins, attr.loses AS user_loses,
				states.name AS state, states.uf,
				a.id AS armor_id, a.name AS armors_name, concat(a.health, '/', a.health_max) AS armor_health, a.cosmo AS armor_cosmo, a.str AS armor_str, a.res AS armor_res, a.dex AS armors_dex, a.vit AS armor_vit,
				categories.DESC AS armor_category,
				classes.DESC AS armor_class
				FROM users AS u
				INNER JOIN users_attributes AS attr
				ON u.id = attr.user_id
				INNER JOIN states 
				ON attr.state = states.id
				LEFT JOIN armors AS a
				ON u.id = a.user_id
				LEFT JOIN categories 
				ON a.category_id = categories.id
				LEFT JOIN classes
				ON a.class_id = classes.id");
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::connection(Config::get('sentry::sentry.db_instance'))->pdo->query("DROP VIEW `vw_profile_data`");
	}

}