<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreUanswerRequest;

use App\Play;
use App\Test;
use App\Question;
use App\Answer;
use App\Uanswer;

class PlayController extends Controller
{
    public function index(Request $request) {
    	$tests = Test::all();

    	return view('play.index', compact('tests'));
    }

    public function start(Request $request, $test_id) {
    	$test = Test::find($test_id);

    	$play = new Play();
    	$play->test_id = $test->id;
    	$play->name = $test->name;
    	$play->save();

    	return redirect()->route('do_play', ['play_id' => $play->id]);
    }

    public function play(Request $request, $play_id) {
    	$play = Play::find($play_id);

    	$questions = Question::where('test_id', $play->test_id)->get();

		foreach($questions as $question) {
			$uanswered = $play->uanswers->where('question_id', $question->id)->first();

			if(!$uanswered) {
				return view('play.question', ['question' => $question, 'play_id' => $play->id]);
			}
		}

    	return redirect()->route('end_play', ['play_id' => $play->id]);
    }

    public function store(StoreUanswerRequest $request, $play_id) {
    	$validated = $request->validated();
    	
    	$uanswer = new Uanswer();
    	$uanswer->play_id = $play_id;
    	$uanswer->question_id = $request->input('question_id');
    	$uanswer->answer_id = $request->input('answer_id');
    	$uanswer->save();

    	// Continue playing
    	return redirect()->route('do_play', ['play_id' => $play_id]);
    }

    public function end(Request $request, $play_id) {
    	$play = Play::find($play_id);

    	return view('play.end', compact('play'));
    }
}
