<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\DestroyQuestionRequest;

use App\Question;
use App\Answer;

class QuestionsController extends Controller
{
    public function store(StoreQuestionRequest $request, $test_id) {
        $validated = $request->validated();

        $question = new Question();
        $question->name = $request->input('name');
        $question->test_id = $test_id;
        $question->save();

        $answers = $request->input('answer');
        foreach ($answers as $key => $answer_name) {
        	// Skip if answer is empty. We do not want to import empty answers for sure.
        	if(empty($answer_name)) {
        		continue;
        	}

        	$answer = new Answer();
        	$answer->name = $answer_name;
            $answer->question_id = $question->id;

        	// Mark this as valid answer.
            $correct = $request->input('correct');
            $correct = $correct[0];
        	if($key == $correct) {
        		$answer->correct = true;
        	}

        	$answer->save();
        }

        return redirect()->route('edit_test', ['test_id' => $test_id])->withSuccess('New question added successfully!');
    }

    public function destroy(DestroyQuestionRequest $request) {
        $validated = $request->validated();

        $question = Question::find($request->input('question_id'));

        $test_id = $question->test->id;

        $question->answers()->delete();
        $question->delete();

        return redirect()->route('edit_test', ['test_id' => $test_id])->withSuccess('Question deleted successfully!');
    }
}
