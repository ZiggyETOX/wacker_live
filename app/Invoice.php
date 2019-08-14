<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
    protected $fillable = [
        'date',
    ];

    public function Transaction() {
        return $this->hasMany('App\Transaction');
    }
    
    public function Client() {
        return $this->belongsTo('App\Client');
    }
}
