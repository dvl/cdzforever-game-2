<?php

class Register_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'csrf')->on('post');
	}

	/**
	 * Mostra o formulário de cadastro, e se por alguma razão a pessoa estiver logada redireciona pra home
	 *
	 * @return View
	 */

	public function get_index() {
		if (Auth::check()) {
			return Redirect::home();
		}
		else {
			return View::make('register.index');
		}
	}

	public function post_index() {
		try {
			if (Register::is_valid(Input::get())) { 		

				$user = Sentry::user()->register(array(
					'username' => Input::get('username'),
					'email'    => Input::get('email'),
					'password' => Input::get('password'),
					'metadata' => array(
						'sex' => Input::get('sex'),
						'state'  => Input::get('state'),
					),
				));

				Bundle::start('swiftmailer');
				$mailer = IoC::resolve('mailer');

				$message = Swift_Message::newInstance('Message From Website')
				->setFrom(array('no-reply@cdzforever.net '=> 'CDZForever'))
				->setTo(array(Input::get('email') => Input::get('username')))
				->setBody(View::make('emails.code', array('code' => $user['hash'], 'user' => Input::get('username'))), 'text/html');

				$mailer->send($message);

				$invite = Invite::where('code', '=', Input::get('invite'))->first();
				$invite->used_by = $user['id'];
				$invite->save();

				return View::make('register.post', array('email' => Input::get('email'), 'nick' => Input::get('username')));
				/* redirecionar pra home com flash */
			}

			else {
				return Redirect::to('register')->with_errors(Register::$validation)->with_input();
			}
		}
		catch (Sentry\SentryException $e) {
			$errors = new Laravel\Messages();
			$errors->add('sentry', $e->getMessage());
			return Redirect::to('register')->with_errors($errors)->with_input();
		}
	}

	public function get_activate($userid, $code) {
		try {
			$activate_user = Sentry::activate_user($userid, $code);

			if ($activate_user)	{
				/* redirecionar pro login com flash */
			}
			else {
				/* redirecionar pra home com flash */
			}

		}
		catch (Sentry\SentryException $e) {
			echo $e->getMessage();
			/* redirecionar pra home com flash */
		}
	}
}