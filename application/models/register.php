<?php

class Register extends Eloquent { 

	protected static $rules = array(
		'username' => 'required|between:3,30|alpha|unique:users,username',
		'email' => 'required|email|unique:users,email',
		'invite' => 'required|exists:invites,code|used',
		'password' => 'required|min:6',
		'password-check' => 'same:password',
		'rules' => 'accepted',
		//'terms' => 'accepted'
	);

	protected static $messages = array(
		'username_required' => 'O campo usuário deve ser preenchido',
		'username_between' => 'O nome de usuário deve ter entre 3 e 30 caracteres',
		'username_alpha' => 'O nome de usuário do deve conter somente letras',
		'username_unique' => 'Já existe uma conta registrada com esse nome de usuário, escolha outro',
		'email_required' => 'O campo e-mail deve ser preenchido',
		'email_email' => 'O campo e-mail deve conter um e-mail valido',
		'email_unique' => 'Já existe uma conta registrada com seu endereço de email',
		'invite_required' => 'Você deve informar o código do seu convite.',
		'invite_exists' => 'Convite inválido.',
		'invite_used' => 'Convite já usado',
		'password_required' => 'O campo senha deve ser preenchido',
		'password_min' => 'A senha deve ter no minimo 6 caracteres',
		'password-check_same' => 'As senhas digitadas não são iguais',
		'rules_accepted' => 'Você deve ler e concordar com as Regras e com os Termos de Uso antes de continuar',
	);

	public static $validation = false;

	public static function is_valid($input) {

		Validator::register('used', function($attribute, $value, $parameters) {
			$invite = new Invite();
			
			return $invite->used_by($value) == 0;
		});

		static::$validation = Validator::make($input, static::$rules, static::$messages);

		return static::$validation->passes();
	}
	

}