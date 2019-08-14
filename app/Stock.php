<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
	public function Plant() {
		return $this->belongsTo('App\Plant');
	}
}
