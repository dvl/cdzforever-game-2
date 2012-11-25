<?php

class Test_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'csrf')->on('post');
	}

	public function get_sm() { 
		try {
			$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')->setUsername('no-reply@cdzforever.net')->setPassword('6m2U+KGy');

			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance('Message From Website')
			->setFrom(array('no-reply@cdzforever.net '=> 'CDZForever'))
			->setTo(array('contato@xdvl.info' => 'dvl'))
			->setBody(View::make('emails.code', array('code' => 'user/auth', 'user' => 'dvl', 'pass' => '123456')));

			$mailer->send($message);
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}