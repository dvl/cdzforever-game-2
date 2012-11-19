<?php

class Login_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'csrf')->on('post');
	}

	/**
	 * Mostra o formulário de login, e se por alguma razão a pessoa estiver logada redireciona pra home
	 *
	 * @return View
	 */

	public function get_index() {
		if (Auth::check()) {
			return Redirect::home();
		}
		else {
			return View::make('login.index');
		}
	}

	public function post_index() {



	}
}