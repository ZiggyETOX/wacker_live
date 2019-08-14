<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
	
	public function User() {
		return $this->belongsTo('App\User');
	}

    public function Stock() {
        return $this->hasMany('App\Stock');
    }

    public function Transaction() {
        return $this->hasMany('App\Transaction');
    }
}
