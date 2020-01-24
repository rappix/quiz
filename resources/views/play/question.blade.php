@extends('master')

@section('content')

	<div class="card">
		<div class="card-header"><h3>{{ $question->test->name }}</h3></div>
		<div class="card-body">
			<h2 class="card-title">{{ $question->name }}</h2>
			@foreach($question->answers->shuffle() as $answer)
				<form action="{{ route('check_uanswer', ['play_id' => $play_id ]) }}" method="post" class="d-inline">
					{{ csrf_field() }}
					<input type="hidden" name="question_id" value="{{ $question->id }}">
					<input type="hidden" name="answer_id" value="{{ $answer->id }}">
					<button type="submit" class="btn btn-primary">{{ $answer->name }}</button>
				</form>
			@endforeach
		</div>
	</div>
@endsection