<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'fullName', 'information','user_id',
    ];

    public function Invoice() {
        return $this->hasMany('App\Invoice');
    }
    
    public function User() {
        return $this->belongsTo('App\User');
    }
}
