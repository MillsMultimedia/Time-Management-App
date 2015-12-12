<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     public function account() {
     	return $this->belongsTo('\App\Account');
     }
}
