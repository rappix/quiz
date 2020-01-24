<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uanswer extends Model
{
    public function play() {
    	return $this->belongsTo('App\Play');
    }

    public function question() {
    	return $this->belongsTo('App\Question');
    }
}
