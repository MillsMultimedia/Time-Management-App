<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	public function edit() {
		return $this->hasMany('\App\Edit');
	}
}
