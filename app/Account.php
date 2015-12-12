<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	public function task() {
		return $this->hasMany('\App\Task');
	}
}
