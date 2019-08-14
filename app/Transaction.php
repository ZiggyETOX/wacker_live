<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

	public function Plant() {
		return $this->belongsTo('App\Plant');
	}

	public function Invoice() {
		return $this->belongsTo('App\Invoice');
	}

}
