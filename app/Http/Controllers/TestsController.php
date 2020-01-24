<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreTestRequest;

use App\Test;

class TestsController extends Controller
{
    public function index(Request $request) {
        $tests = Test::all();

        return view('tests.index', compact('tests'));
    }

    public function create(Request $request) {
        return view('tests.create');
    }

    public function store(StoreTestRequest $request) {
        $validated = $request->validated();

        $test = new Test();
        $test->name = $request->input('name');
        $test->save();

        return redirect()->route('edit_test', ['test_id' => $test->id]);
    }

    public function edit(Request $request, $test_id) {
        $test = Test::find($test_id);

        // If test is not valid/doesn't exist
        if(!$test) {
            // Redirect to create a new test
            return redirect()->route('create_test')->withErrors('The requested test is not found.');

            // Or redirect to 404 page, it is a matter of choice ;)
            // abort(404);
        }

        return view('tests.edit', compact('test'));
    }

    public function update(StoreTestRequest $request, $test_id) {
        $validated = $request->validated();

        $test = Test::find($test_id);
        $test->name = $request->input('name');
        $test->save();

        return redirect()->route('edit_test', ['test_id' => $test->id])->withSuccess('Successfully updated.');
    }

    public function destroy(Request $request, $test_id) {
        $test = Test::find($test_id);

        foreach($test->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }

        $test->delete();

        return redirect()->route('show_tests')->withSuccess('The requested test is deleted.');
    }
}
