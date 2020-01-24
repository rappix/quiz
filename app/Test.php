<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
    ];

    public function questions() {
    	return $this->hasMany('App\Question')->orderBy('updated_at', 'DESC');
    }
}
