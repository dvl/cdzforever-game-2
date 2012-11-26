<?php

class Profile_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before', 'csrf')->on('post');
	}

	public function get_index($username = null) {
		if (!isset($username)) {
			$username = 'dvl';
		}
		$user = DB::table('vw_profile_data')->where('username', '=', $username)->first();

		if (count($user)) {
			return View::make('profile.index')->with('user', $user);
		}
		else {
			return Response::error('404');
		}
	}
}

