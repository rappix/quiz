@extends('master')

@section('content')

<a href="{{ route('create_test') }}" class="btn btn-primary mb-3">Create NEW Test</a>

<form action="{{ route('destroy_test', ['test_id' => $test->id ]) }}" method="post">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-sm btn-danger d-inline">Delete THIS Test</button>
</form>

<br>

<form action="{{ route('update_test', ['test_id' => $test->id]) }}" method="post">
    {{ csrf_field() }}
    <h1>Edit Test: {{ $test->name }}</h1>
    <div class="form-group">
        <label for="test_name">Test Name</label>
        <input type="text" class="form-control" name="name" id="test_name" placeholder="Your test name" value="{{ $test->name }}">
    </div>

    <button type="submit" class="btn btn-success mb-3">Update</button>
</form>

@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@php
    // Little bit of help for answers, prevent reseting of the form
    $answers = old('answer');
    $answers_count = $answers ? count($answers) : 1;
    $correct = old('correct');
    $correct = $correct[0] ?? 99999;
@endphp

<form action="{{ route('store_question', ['test_id' => $test->id]) }}" method="post">
    {{ csrf_field() }}
    <h1>Add question</h1>
    <div class="form-group">
        <label for="question_name">Question Name</label>
        <input type="text" class="form-control" name="name" id="question_name" placeholder="Your question here" value="{{ old('name') }}">
    </div>

    <div id="answers">
        @for($i=0; $i < $answers_count; $i++)
            @include('answers.new', ['answer_count' => $i, 'answer' => $answers[$i] ?? '', 'correct' => $correct])
        @endfor
    </div>

    <button type="submit" class="btn btn-success mb-3">Save</button>
    <a href="#" id="answer_add" class="btn btn-primary mb-3">Add Answer</a>
</form>

<script type="text/javascript">
let current_answer_num = {{ $answers_count }};

function AddAnswerField(){
    let html = `@include('answers.new', ['answer_count' => 'ANSWER_NUM' ])`;
    html = html.replace(new RegExp('ANSWER_NUM', 'g'), current_answer_num);

    let div = document.createElement('div');
    div.innerHTML = html;

    answers.appendChild(div);

    current_answer_num++;
}

document.getElementById('answer_add').addEventListener('click', AddAnswerField);
</script>

@if($test->questionsCount() > 0)
    <h1>All Questions</h1>
@endif
@foreach($test->questions as $question)
    <form action="{{ route('destroy_question', ['test_id' => $test->id ]) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <span class="d-inline">{{ $question->name }}</span>
        <button type="submit" class="btn btn-sm btn-danger d-inline">X</button>
    </form>
@endforeach

@endsection