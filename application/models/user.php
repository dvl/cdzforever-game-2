<?php

class User extends Eloquent { 

	public function invite() {
		return $this->has_one('Invite');
	}

	public function invites() {
		return $this->has_many('Invite');
	}
}