<?php

class Invite extends Eloquent { 

	public function user() {
		return $this->belongs_to('User');
	}

	public function used_by($code) { 
		$invite = static::where('code', '=', $code)->first();

		if ($invite) { 
			return $invite->used_by;
		}
		else { 
			return 0;
		}
	}
}