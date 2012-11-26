<?php

class Home_Controller extends Base_Controller {

	public function action_index() {
		if (!Sentry::check()) {
			return Redirect::to('news');
		}
		else {
			return View::make('home.index');
		}
	}
}