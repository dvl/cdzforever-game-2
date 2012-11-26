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
		if (Sentry::check()) {
			return Redirect::home();
		}
		else {
			return View::make('login.index');
		}
	}

	public function post_index() {
		try {
			if (Sentry::login(Input::get('username'), Input::get('password'), Input::get('remember'))) {
				Session::flash('success', 'Login efetuado!');
				return Redirect::home();
			}
			else {
				$errors = new Laravel\Messages();
				$errors->add('password', 'Senha Inválida');
				return Redirect::to('login')->with_errors($errors)->with_input();
			}
		}
		catch (Sentry\SentryException $e) {
			$errors = new Laravel\Messages();
			$errors->add('username', $e->getMessage());
			return Redirect::to('login')->with_errors($errors)->with_input();
		}
	}
}