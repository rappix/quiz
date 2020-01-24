<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Play extends Model
{
	public function uanswers() {
    	return $this->hasMany('App\Uanswer');
    }

    public function test() {
    	return $this->belongsTo('App\Test');
    }

    public function questions() {
    	return $this->test->questions;
    }

    public function results() {
    	$this->total = count($this->questions());
    	$this->correct = 0;

    	foreach($this->uanswers as $uanswer) {
    		foreach($uanswer->question->answers as $answer) {
    			if($answer->correct && $uanswer->answer_id == $answer->id) {
    				$this->correct++;
    			}
    		}
    	}

    	$this->success = $this->correct*100/$this->total;
    	$this->success = number_format((float)$this->success, 2, '.', '');

    	return $this;
    }
}
