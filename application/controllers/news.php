<?php

class News_Controller extends Base_Controller {

	public function action_index($id = null) {
		if (isset($id)) {
			// mostra noticia toda
		}
		else {
			return View::make('news.index');
		}
	}
}