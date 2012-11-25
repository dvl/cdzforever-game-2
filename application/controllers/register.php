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

				$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')->setUsername('no-reply@cdzforever.net')->setPassword('6m2U+KGy');

				$mailer = Swift_Mailer::newInstance($transport);

				$message = Swift_Message::newInstance('CDZForever - Seu código de ativação!')
				->setFrom(array('no-reply@cdzforever.net '=> 'CDZForever'))
				->setTo(array('contato@xdvl.info' => 'dvl'))
				->setBody(View::make('emails.code', array('code' => $user['hash'], 'user' => Input::get('username'), 'pass' => Input::get('password'))));

				$mailer->send($message);

				$invite = Invite::where('code', '=', Input::get('invite'))->first();
				$invite->used_by = $user['id'];
				$invite->save();

				Session::flash('success', 'Sua conta foi criada com sucesso! Em instantes você deve receber um e-mail com instruções de como ativar sua conta.');
				return Redirect::to('/');
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
			$activate_user = Sentry::activate_user($userid, $code, true);

			if ($activate_user)	{
				Session::flash('success', 'Sua conta foi ativada com sucesso! Agora basta logar para começar a jogar.');
				return Redirect::to('login');
			}
			else {
				Session::flash('error', 'Conta inexistente ou já ativada!');
				return Redirect::to('/');
			}

		}
		catch (Sentry\SentryException $e) {
			Session::flash('error', 'Conta inexistente ou já ativada!');
			return Redirect::to('/');
		}
	}
}