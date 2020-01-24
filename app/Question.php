<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function test() {
    	return $this->hasOne('App\Test');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }
}
